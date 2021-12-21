<style>
    .myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    .myImg:hover {opacity: 0.7;}

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.9);
        border-radius: 10px;
    }

    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        border-radius: 10px;
        border: 0px dotted orange;
    }

    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    .modal-content, #caption {
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @keyframes zoom {
        from {transform:scale(0)}
        to {transform:scale(1)}
    }

    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
    }
</style>

<div id="myModal" class="modal">
  <span class="close" onclick="document.getElementById('myModal').style.display = 'none';">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<?php
    $files = scandir("images");

    for($i = 2; $i < count($files); $i++){ ?>
        <div class="myImg" data-src="images/<?= $files[$i]?>" style="align-self:center;text-align:center;" 
            onclick="document.getElementById('myModal').style.display = 'block';
                     document.getElementById('img01').src = this.dataset.src;
                     document.getElementById('caption').innerHTML = 'Оригинальное изображение';">
            <?php if(!file_exists("thumbnails/".$files[$i])) {
                    echo '<img width="200" src="thumbnails/default.png" alt="" style="border-radius:5px;">';
                } else {
                    echo '<img width="200" src="thumbnails/'.$files[$i].'" alt="" style="border-radius:5px;">';
                }
            ?>
        </div>
<?php
}
