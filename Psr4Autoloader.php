<?php

Class Psr4Autoloader{
    private $paths;

    function register(): void{
        spl_autoload_register(function(string $className){
            foreach ($this->paths as $path) {
                if(strpos($className, $path["namespace"]) !== false){
                    $file = $path["directory"] . substr($className, strlen($path["namespace"])) . ".php";
                    if (file_exists($file)) {
                        require $file;
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