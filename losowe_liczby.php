<?php 

function generowanieTablicy($min, $max, $jaka, $ile){
    if($jaka==1){
        $tab=[];
        $pom;
        $pom2=false;
        for($i=0;$i<$ile;$i++){
            do{
                $pom=rand($min,$max);
                if(!in_array($pom, $tab)) {
                    $tab[]=$pom;
                    $pom2=true;
                }

            }while($pom2==false);
        }
        return $tab;
    }

    if($jaka==2){
        $tab=[];
        for($i=0;$i<$ile;$i++){
            $tab[]=rand($min,$max);
        }
        return $tab;
    }

}


$flaga=true;
do{
    echo "Jaką tablice chcesz wygenerować? \n [1]-Bez powtarzających się liczb \n [2]-Z powtarzającymi się liczbami \n";
    $odp=readline("");
    if(!is_numeric($odp)){
        echo "Podano zly znak\n";
        continue;
    }
    $jaka=intval($odp);
    if(($jaka>=3 or $jaka<0)){
        echo "Podano zla opcje\n";
        continue;
    }
    
    echo "Podaj zakres\n";
    $odp=readline("MIN: ");
    if(!is_numeric($odp)){
        echo "Podano zly znak\n";
        continue;
    }
    $min=intval($odp);


    $odp=readline("MAX: ");
    if(!is_numeric($odp)){
        echo "Podano zly znak\n";
        continue;
    }
    if($odp<=$min and $jaka == 1){
        echo "Podano zly zakres\n";
        continue;
    }
    $max=intval($odp);


    $odp=readline("Podaj ile liczba ma byc wygenerowanych: ");
    if(!is_numeric($odp)){
        echo "Podano zly znak\n";
        continue;
    }
    $ile=intval($odp);

    $tablica=generowanieTablicy($min, $max, $jaka, $ile);
    print_r($tablica);

    echo "<------------------------------------------------------------>\n Jakiej liczby szukasz: ";
    $odp=readline("");
    if(!is_numeric($odp)){
        echo "Podano zly znak\n";
        continue;
    }
    $szukana_liczba=intval($odp);

    $flaga_szukana_liczba=false;
    for($i=0;$i<$ile-1;$i++){
        if($tablica[$i]==$szukana_liczba){
            $pozycja_szukana_liczba=$i;
            $flaga_szukana_liczba=true;
            break;
        }
    }


    if($flaga_szukana_liczba){
        echo "Znaleziono liczbe w ";
        echo $pozycja_szukana_liczba;
    }else{
        echo "Nie znaleziono liczby";
    }

    $flaga=false;

}while($flaga==true)


    
?>