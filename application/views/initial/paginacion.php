
<div class='card-body'>
    <ul class='pagination justify-content-center'>

    <?php 
        if(isset($profesormodulo) && $profesormodulo!=FALSE){
            $i=1;
            foreach($profesormodulo->result() as $profmodul){
                
                $estado=($profmodul->id_modulo ==$i)? $profmodul->fkid_estado : 3;
                echo "<li class='page-item'><a class='page-link estado_$estado' href='".base_url()."modulo$i'>Módulo $i</a></li>";   
                
                if($i == 6)
                    echo "</ul><ul class='pagination justify-content-center'>";
                $i++;
            }
        }
    ?>
</ul>
    <h4>Avance de la metodología</h4>
</div>
<?php 
    $this->load->view('initial/chatbot');
?>
