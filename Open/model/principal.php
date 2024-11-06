<?php

class principalModel{
    protected static function conectar(){
        $base=new PDO("mysql:host=localhost;dbname=sistema2","root","mysql");
        $base->exec("SET CHARACTER SET utf8");
        return $base;
    }
    protected static function consultasSimples ($consulta){
        $conectar=self::conectar()->prepare($consulta);
        $conectar->execute();
        return $conectar;

    }

    protected static function paginador($paginas,$nPaginas,$url,$botones,$calcular,$registro){
    
        $paginador="<nav class='paginador'>
                        <ul class='ul'>
                        ";
        // esto es igual para el final del paginador revisar $pagina==$nPaginas                
        if ($paginas==1) {
            $paginador.="<li><span> << </span></li>";
        } else {
            $paginador.='
                            <li><a href="'.$url.($paginas-1).'"> << </a></li>';
        }

   
       
        for($i=$paginas; $i<=$nPaginas;$i++){
            $break=$calcular/$i;
            
            if($i>$paginas){
                break;
            }
            if ($paginas==$i) {
               
                $paginador.=' <li><a class="active" href="'.$url.$i.'"> '.$i.' </a></li>';
            } 

       
            if($i>=$nPaginas){
         
                $calcular=($calcular/$nPaginas);
                if($calcular==$registro){
              
                    break;

                }
                if($break<=$registro){
                    break;
                
                }else{
                $paginador.=' <li><a href="'.$url.($i+1).'"> '.($i+1).' </a></li>';
                }
            }            
              

           


          
        };
  
      
        $calcular=($calcular/$registro);
        if($break<=$registro){
          
            $paginador.="<li><span> >> </span></li>";
        } else {   
            $paginador.= '<li><a href="'.$url.($paginas+1).'"> >> </a></li>';
        
             
                          
        }


   
        $paginador.="</ul>
              </nav";
        return $paginador;
        if($pagina==$nPaginas){
            exit();
        }
    }
}
?>