<?php
/*
* @Auther: Nilesh Ramani
* Description: Upload any types of file and it stored to mysql database and retrive it
* Date: 06-01-2014 01:30 PM
*/

//  CREATE TABLE DEFINATION
/*CREATE TABLE `uploadfiletodatabase` (
    `id`        Int Unsigned Not Null Auto_Increment,
    `name`      VarChar(255) Not Null Default 'Untitled.txt',
    `mime`      VarChar(50) Not Null Default 'text/plain',
    `size`      BigInt Unsigned Not Null Default 0,
    `data`      MediumBlob Not Null,
    `created`   DateTime Not Null,
    PRIMARY KEY (`id`)
)*/

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';