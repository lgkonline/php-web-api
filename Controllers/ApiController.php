<?php

class ApiController extends Controller {

    // This lists all controllers and it's parameters. You could use this for your documention.
    public function Index() {
        global $controllerFiles;

        $controllers = [];

        foreach ($controllerFiles as $currFile) {
            if ($currFile != "Controller.php" && strpos($currFile, "Controller") !== false) {
                $className = str_replace(".php", "", $currFile);
                $class = new \ReflectionClass($className);
                $actions = [];
                $methods = $class->getMethods(ReflectionMethod::IS_PUBLIC);

                foreach ($methods as $m) {
                    if ($m->name != "__construct") {
                        $actions[] = [ "name" => $m->name, "parameters" => $m->getParameters() ];
                    }
                }

                $controller = [
                    "className" => $className,
                    "actions" => $actions
                ];

                $controllers[] = $controller;
            }
        }

        return $controllers;
    }
}