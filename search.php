<?php
    include ('connection.php');

    $searchcontent = $_REQUEST['sc'];
    
    $searchmovie_sql = "SELECT movieID, title, poster, releasedate FROM movies WHERE title LIKE '%$searchcontent%'";
    $searchmovie_res = mysqli_query($conn, $searchmovie_sql);
    $searchmovie_arr = mysqli_fetch_all($searchmovie_res);

    $searchnews_sql = "SELECT newsID, newstitle, newsUrl FROM news WHERE newstitle LIKE '%$searchcontent%'";
    $searchnews_res = mysqli_query($conn, $searchnews_sql);
    $searchnews_arr = mysqli_fetch_all($searchnews_res);

    if ($searchcontent != "") {
            $imgpath = 'img/';
            // echo '<span class="ds-dropdown-menu" role="listbox" id="dropdownarea">';
            echo '<h6 class="dropdown-header">Movies</h6>';

        for ($a = 0; $a < count($searchmovie_arr); $a++) {
            echo '
                <form method="post" action="movie_detail.php">
                <input type="hidden" name="movieid" value="'.$searchmovie_arr[$a][0].'">
                <button class="dropdown-item" href="#" type="submit">
                    <div class="row">
                        <div id="posterarea" style="display:inline-block">
                            <img src='.$imgpath.$searchmovie_arr[$a][2].' style = "width: 35px; height:auto">
                        </div>
                        <div id="titlearea" style="display:inline-block; padding-left:5px;">
                            <p style="color:black"><b>'.$searchmovie_arr[$a][1].'</b><br><i>'.$searchmovie_arr[$a][3].'</i></p>
                        </div>
                    </div>
                </button>
                </form>
            ';
        }

            echo '<div class="dropdown-divider"></div>
                <h6 class="dropdown-header">News</h6>
                <ul class="list-group list-group-flush">
                ';

        for ($b = 0; $b <count($searchnews_arr); $b++) {
            echo '
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a class="dropdown-item" style="color:black" href="'.$searchnews_arr[$b][2].'"><b>
                    '.$searchnews_arr[$b][1].'
                    </b></a>
                    <span class="badge badge-primary badge-pill">new</span>
                </li>
            ';
        }
            echo '
                </ul>
            ';
    } else {
        echo "";
    }

    