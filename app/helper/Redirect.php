<?php

function redirect($page){
    header('Location: ' . BASEURL . ''.$page.'');
    exit;
}