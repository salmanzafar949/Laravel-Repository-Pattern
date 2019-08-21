<?php

namespace Salman\RepositoryPattern\Service;



class RepositoryService {

    protected static function getStubs($type)
    {
        return file_get_contents(resource_path("vendor/salmanzafar/stubs/$type.stub"));
    }

    public static function MakeInterface($name)
    {
        $template = str_replace(
            ['{{modelName}}'],
            [$name],

            self::GetStubs('RepositoryInterface')
        );

        if (!file_exists($path=base_path('/Repositories')))
            mkdir($path, 0777, true);

        file_put_contents(base_path("/Repositories/{$name}RepositoryInterface.php"), $template);

    }

    public static function MakeRepositoryClass($name)
    {
        $template = str_replace(
            ['{{modelName}}'],
            [$name],
            self::GetStubs('Repository')
        );

        if (!file_exists($path=base_path('/Repositories')))
            mkdir($path, 0777, true);

        file_put_contents(base_path("/Repositories/{$name}Repository.php"), $template);

    }
}
