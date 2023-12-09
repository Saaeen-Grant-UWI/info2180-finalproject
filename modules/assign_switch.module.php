<?php

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    print_r($_GET);
    update();
}