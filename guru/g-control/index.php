<?php session_start(); if(empty($_SESSION['c_guru'])){ header('location:../../login'); }
else {header('location:../main');} ?>