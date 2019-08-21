<?php

namespace Salman\RepositoryPattern\Service;



class RepositoryService {

    protected static function getStubs($type)
    {
        return file_get_contents(resource_path("vendor/salmanzafar/stubs/$type.stub"));
    }

    public static function ImplementNow($name)
    {
        if (!file_exists($path=base_path('/Repositories')))
            mkdir($path, 0777, true);

        self::MakeInterface($name);
        self::MakeRepositoryClass($name);
    }


    protected static function MakeInterface($name)
    {
        $template = str_replace(
            ['{{modelName}}'],
            [$name],

            self::GetStubs('RepositoryInterface')
        );

        file_put_contents(base_path("/Repositories/{$name}RepositoryInterface.php"), $template);

    }

    protected static function MakeRepositoryClass($name)
    {
        $template = str_replace(
            ['{{modelName}}'],
            [$name],
            self::GetStubs('Repository')
        );

        file_put_contents(base_path("/Repositories/{$name}Repository.php"), $template);

    }
}
