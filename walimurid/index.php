<?php session_start(); if(empty($_SESSION['c_orangtua'])){ header('location:../login'); }
else {header('location:main');} ?>