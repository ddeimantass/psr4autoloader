<?php

Class Psr4Autoloader{
    private $paths;

    function register(): void{
        spl_autoload_register(function(string $className){
            foreach ($this->paths as $path) {                
                if(strpos($className, $path["namespace"]) !== false){
                    $fileName = str_replace("\\", "/", substr($className, strlen($path["namespace"])));
                    $filePath = $path["directory"] . "{$fileName}.php";
                    if (file_exists($filePath)) {
                        require $filePath;
                    }
                }
            }
        });
    }
    
    function add(string $name, string $dir): self{
        $this->paths[] = array(
                "namespace" => $name,
                "directory" => $dir,
            );
        return $this;
    }
}
?>