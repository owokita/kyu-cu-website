<?php
 require 'database.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
//loading the iofactory class to make the xlsx file
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Conditional;
use PhpOffice\PhpSpreadsheet\Style\Color;

//1) Load the template
    //load from xlsx template
    $reader =  IOFactory::createReader('Xlsx');
    $spreadsheet =$reader->load("kyucuAllMembersTemplate.xlsx");

//2) add the content
    //data from the database
   
    $userOBJ = new DATABASE();
    $sql= "SELECT user_id,user_email,user_fname,user_lname,user_phobeNo,user_regno,user_course,user_joindate,registered_by from user WHERE user_id != 1;";
    $stmt = $userOBJ->conn()->prepare($sql);
    $stmt->execute();
    
       
    //loop the data
    $contentStartRow =3;
    $CurrentContentRow =3;

    while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //insert a row after the currentrwo (bofore row ++)
        $spreadsheet->getActiveSheet()->insertNewRowBefore($CurrentContentRow+1, 1);

        //fill the cell with data
        $spreadsheet->getActiveSheet()
            ->setCellValue('A'.$CurrentContentRow, $CurrentContentRow-1)
            ->setCellValue('B'.$CurrentContentRow, $user['user_fname'] . ' '.$user['user_lname'])
            ->setCellValue('C'.$CurrentContentRow, $user['user_regno'])
            ->setCellValue('D'.$CurrentContentRow, '0'.substr($user['user_phobeNo'], -9))
            ->setCellValue('E'.$CurrentContentRow, $user['user_email'])
            ->setCellValue('F'.$CurrentContentRow, $user['user_course'])
            ->setCellValue('G'.$CurrentContentRow, $user['user_joindate'])
            ->setCellValue('H'.$CurrentContentRow, $user['registered_by']);

            

        //increment the current row
        $CurrentContentRow++;

        //remove last emptry rows
    }

    $spreadsheet->getActiveSheet()->removeRow($CurrentContentRow, 2);
    
    


//3) Remove the last empty rows


//4)Conditional Formating

















//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="KYU-CU-MEMBERS.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
