<?php
  function randomImage(){
    $imagesDir = 'images/';
    $images = glob($imagesDir . '*.{jpg}', GLOB_BRACE);
    $randomImage1 = $images[array_rand($images)];
    $randomImage2 = $images[array_rand($images)];
    $randomImage3 = $images[array_rand($images)];

    for($i=1; $i<count($images); $i++)
    {
      if($randomImage1 === $randomImage2 || $randomImage1 === $randomImage3)
      {
        $randomImage1 = $images[array_rand($images)];
      }
      if($randomImage2 === $randomImage1 || $randomImage2 === $randomImage3)
      {
        $randomImage2 = $images[array_rand($images)];
      }
      if($randomImage3 === $randomImage1 || $randomImage3 === $randomImage2)
      {
        $randomImage3 = $images[array_rand($images)];
      }
    }

    echo "<div class='carousel-inner'>
      <div class='carousel-item active'>
        <img src='$randomImage1' alt='slika' width='100%'>
      </div>
      <div class='carousel-item'>
        <img src='$randomImage2' alt='slika' width='100%'>
      </div>
      <div class='carousel-item'>
        <img src='$randomImage3' alt='slika' width='100%'>
      </div>
    </div>";
  }

  function randomCitat($broj){
    function current_url()
          {
            $url      = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $validURL = str_replace("&", "&amp", $url);
            return $validURL;
          }
          $offer_url = current_url();
          if("http://domaci.localhost/D_RAPUST_PROJEKAT_DUSAN_%20KOSTIC/index.php" !== $offer_url)
            {
              $broj=$_GET['id'];
            }
          
          if($broj == 1)
          {
            //POSAO
            $file_arr = file("citati/posao.txt");
            $num_lines = count($file_arr);
            $last_arr_index = $num_lines - 1;
            $citat = rand(0, $last_arr_index);
            $citat_minus1 = $citat - 1;
            $tvorac = $citat + 1;
            if ($citat%2==0)
            {
              $rand_text = $file_arr[$citat];
              echo "<span class='h2'>$rand_text</span>";
              echo "<br>";
              $tvorac_text = $file_arr[$tvorac];
              echo "<span class='font-italic'>$tvorac_text;<span>";
            }
            else
            {
              $rand_text = $file_arr[$citat_minus1];
              echo "<span class='h2'>$rand_text</span>";
              echo "<br>";
              $tvorac_text = $file_arr[$citat];
              echo "<span class='font-italic'>$tvorac_text;<span>";
            }
          }
          elseif($broj == 2)
          {
            //ZDRAVLJE
            $file_arr = file("citati/zdravlje.txt");
            $num_lines = count($file_arr);
            $last_arr_index = $num_lines - 1;
            $citat = rand(0, $last_arr_index);
            $citat_minus1 = $citat - 1;
            $tvorac = $citat + 1;
            if ($citat%2==0)
            {
              $rand_text = $file_arr[$citat];
              echo "<span class='h2'>$rand_text</span>";
              echo "<br>";
              $tvorac_text = $file_arr[$tvorac];
              echo "<span class='font-italic'>$tvorac_text;<span>";
            }
            else
            {
              $rand_text = $file_arr[$citat_minus1];
              echo "<span class='h2'>$rand_text</span>";
              echo "<br>";
              $tvorac_text = $file_arr[$citat];
              echo "<span class='font-italic'>$tvorac_text</span>";
            }
          }
          elseif($broj == 3)
          {
            //LJUBAV
            $file_arr = file("citati/ljubav.txt");
            $num_lines = count($file_arr);
            $last_arr_index = $num_lines - 1;
            $citat = rand(0, $last_arr_index);
            $citat_minus1 = $citat - 1;
            $tvorac = $citat + 1;
            if ($citat%2==0)
            {
              $rand_text = $file_arr[$citat];
              echo "<span class='h2'>$rand_text</span>";
              echo "<br>";
              $tvorac_text = $file_arr[$tvorac];
              echo "<span class='font-italic'>$tvorac_text;<span>";
            }
            else
            {
              $rand_text = $file_arr[$citat_minus1];
              echo "<span class='h2'>$rand_text</span>";
              echo "<br>";
              $tvorac_text = $file_arr[$citat];
              echo "<span class='font-italic'>$tvorac_text</span>";
            }
          }
          elseif($broj == 4)
          {
            //MOTIVACIJA
            $file_arr = file("citati/motivacija.txt");
            $num_lines = count($file_arr);
            $last_arr_index = $num_lines - 1;
            $citat = rand(0, $last_arr_index);
            $citat_minus1 = $citat - 1;
            $tvorac = $citat + 1;
            if ($citat%2==0)
            {
              $rand_text = $file_arr[$citat];
              echo "<span class='h2'>$rand_text</span>";
              echo "<br>";
              $tvorac_text = $file_arr[$tvorac];
              echo "<span class='font-italic'>$tvorac_text;<span>";
            }
            else
            {
              $rand_text = $file_arr[$citat_minus1];
              echo "<span class='h2'>$rand_text</span>";
              echo "<br>";
              $tvorac_text = $file_arr[$citat];
              echo "<span class='font-italic'>$tvorac_text</span>";
            }
          }
          elseif($broj == 5)
          {
            //SPORT
            $file_arr = file("citati/sport.txt");
            $num_lines = count($file_arr);
            $last_arr_index = $num_lines - 1;
            $citat = rand(0, $last_arr_index);
            $citat_minus1 = $citat - 1;
            $tvorac = $citat + 1;
            if ($citat%2==0)
            {
              $rand_text = $file_arr[$citat];
              echo "<span class='h2'>$rand_text</span>";
              echo "<br>";
              $tvorac_text = $file_arr[$tvorac];
              echo "<span class='font-italic'>$tvorac_text;<span>";
            }
            else
            {
              $rand_text = $file_arr[$citat_minus1];
              echo "<span class='h2'>$rand_text</span>";
              echo "<br>";
              $tvorac_text = $file_arr[$citat];
              echo "<span class='font-italic'>$tvorac_text</span>";
            }
          }
          else
          {
            //SVI CITATI
            $file_arr = file("citati/svicitati.txt");
            $num_lines = count($file_arr);
            $last_arr_index = $num_lines - 1;
            $citat = rand(0, $last_arr_index);
            $citat_minus1 = $citat - 1;
            $tvorac = $citat + 1;
            if ($citat%2==0)
            {
              $rand_text = $file_arr[$citat];
              echo "<span class='h2'>$rand_text</span>";
              echo "<br>";
              $tvorac_text = $file_arr[$tvorac];
              echo "<span class='font-italic'>$tvorac_text;<span>";
            }
            else
            {
              $rand_text = $file_arr[$citat_minus1];
              echo "<span class='h2'>$rand_text</span>";
              echo "<br>";
              $tvorac_text = $file_arr[$citat];
              echo "<span class='font-italic'>$tvorac_text</span>";
            }
          }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projekat - Citati</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="row no-gutters">
    <header class="col-sm-12">
      <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <?php
          randomImage();
        ?>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>

      </div>
    </header>
  </div>

  <div class="row no-gutters">
    <nav class="col-sm-4 text-center font-weight-bolder">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" href="index.php?id=1">Posao</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?id=2">Zdravlje</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?id=3">Ljubav</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?id=4">Motivacija</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?id=5">Sport</a>
        </li>
    </ul>
    </nav>
  
  
    <section class="col-sm-8">
      <p class="rounded font-weight-bolder text-center">
        <?php
          $broj=0;
          randomCitat($broj);
        ?>
      </p>
    </section>
  </div>

  <div class="row no-gutters">
    <footer class="col-sm-12 fixed-bottom text-center">
      
        <?php
          $datum = date("d.m.Y");
          $sati = date("H");
          $minuti = date("i");
          echo "$datum, $sati:$minuti"
          ?>
      
    </footer>
  </div>

</body>
</html>