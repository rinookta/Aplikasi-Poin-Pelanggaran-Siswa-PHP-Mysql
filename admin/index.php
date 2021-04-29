<?php session_start(); if(empty($_SESSION['c_admin'])){ header('location:../login'); }
else {header('location:main');} ?>