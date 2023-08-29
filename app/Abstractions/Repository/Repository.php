<?php

namespace App\Abstractions\Repository;

use Illuminate\Container\Container;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use Throwable;

/**
 * @template TModel of \Illuminate\Database\Eloquent\Model
 */
abstract class Repository
{
    /**
     * The name of the repository's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model|TModel>
     */
    protected $model;

    /**
     * The default namespace where factories reside.
     *
     * @var string
     */
    protected static $namespace;

    /**
     * The default model name resolver.
     *
     * @var callable
     */
    protected static $modelNameResolver;

    /**
     * The repository name resolver.
     *
     * @var callable
     */
    protected static $repositoryNameResolver;

    protected function model(callable $action = null)
    {
        $resolver = static::$modelNameResolver ?? function (self $repository) {
            $namespacedRepositoryBasename = Str::replaceLast(
                'Repository',
                '',
                Str::replaceFirst(static::namespace(), '', get_class($repository))
            );

            $repositoryBasename = Str::replaceLast('Repository', '', class_basename($repository));

            $appNamespace = static::appNamespace();

            return class_exists($appNamespace.'Models\\'.$namespacedRepositoryBasename)
                ? $appNamespace.'Models\\'.$namespacedRepositoryBasename
                : $appNamespace.$repositoryBasename;
        };

        if (isset($action)) {
            return $action($this->model ?? $resolver($this));
        }

        return $this->model ?? $resolver($this);
    }

    /**
     * Specify the callback that should be invoked to guess model names based on repository names.
     *
     * @param callable(self): class-string<\Illuminate\Database\Eloquent\Model|TModel> $callback
     *
     * @return void
     */
    public static function guessModelNamesUsing(callable $callback)
    {
        static::$modelNameResolver = $callback;
    }

    /**
     * Specify the default namespace that contains the application's model factories.
     *
     * @return void
     */
    public static function useNamespace(string $namespace)
    {
        static::$namespace = $namespace;
    }

    /**
     * Get a new repository instance for the given attributes.
     *
     * @return static
     */
    public static function new()
    {
        return new static();
    }

    /**
     * Get a new repository instance for the given model name.
     *
     * @param class-string<\Illuminate\Database\Eloquent\Model> $modelName
     *
     * @return Repository
     */
    public static function repositoryForModel(string $modelName)
    {
        return static::resolveRepositoryName($modelName)::new();
    }

    /**
     * Get the repository name for the given model name.
     *
     * @param class-string<\Illuminate\Database\Eloquent\Model> $modelName
     *
     * @return class-string<Repository<TModel>>
     */
    public static function resolveRepositoryName(string $modelName)
    {
        $resolver = static::$repositoryNameResolver ?? function (string $modelName) {
            $appNamespace = static::appNamespace();

            $modelName = Str::startsWith($modelName, $appNamespace.'Models\\')
                ? Str::after($modelName, $appNamespace.'Models\\')
                : Str::after($modelName, $appNamespace);

            return static::namespace().$modelName.'Repository';
        };

        return $resolver($modelName);
    }

    /**
     * Get the application namespace for the application.
     *
     * @return string
     */
    protected static function appNamespace()
    {
        try {
            return Container::getInstance()
                ->make(Application::class)
                ->getNamespace();
        } catch (Throwable) {
            return 'App\\';
        }
    }

    protected static function namespace()
    {
        return static::$namespace ?? static::appNamespace().'Repositories\\';
    }

    public function all($columns = ['*']): Collection
    {
        return $this->model()::all($columns);
    }

    public function getAll($columns = ['*']): Collection
    {
        return $this->all($columns);
    }

    /**
     * @return TModel|null
     */
    public function find($key, $columns = ['*'], array $realations = [])
    {
        if (!empty($realations)) {
            return $this->model()::with($realations)->find($key, $columns);
        }

        return $this->model()::find($key, $columns);
    }

    /**
     * @return TModel
     */
    public function store(array $attributes)
    {
        return $this->model()::create($attributes);
    }

    public function update($key, array $attributes): bool
    {
        return $this->model()::whereKey($key)->update($attributes);
    }

    public function delete($key): bool
    {
        return $this->model()::whereKey($key)->delete();
    }

    public function index(
        array $filters = [],
        int $paginate = 0,
        array $columns = ['*'],
        string $pageName = 'page',
        int $page = null
    ): Collection|LengthAwarePaginator {
        /**
         * @var Builder
         */
        $builder = $this->model(fn ($model) => $model::where(
            fn (Builder $builder) => collect($filters)->each(
                function (string|Model $filterValue, string $filterKey) use ($builder) {
                    if (is_string($filterValue)) {
                        return collect(explode('|', $filterKey))->each(
                            function (string|Model $keyValue, string $keyIndex) use ($builder, $filterValue) {
                                if (!empty($keyValue)) {
                                    if (':' == substr($keyValue, -1)) {
                                        $key = substr($keyValue, 0, -1);

                                        if (0 == $keyIndex) {
                                            return $builder->where($key, 'LIKE', $filterValue);
                                        }

                                        return $builder->orWhere($key, 'LIKE', $filterValue);
                                    }

                                    if (0 == $keyIndex) {
                                        return $builder->where($keyValue, $filterValue);
                                    }

                                    $builder->orWhere($keyValue, $filterValue);
                                }
                            }
                        );
                    }

                    $builder->whereHas($filterKey, fn ($builder) => $builder->where(
                        $filterValue->getKeyName(),
                        $filterValue->getKey()
                    ));
                }
            )
        ));

        $builder->latest();

        if (0 < $paginate) {
            return $builder->paginate($paginate, $columns, $pageName, $page);
        }

        return $builder->get($columns);
    }
}
