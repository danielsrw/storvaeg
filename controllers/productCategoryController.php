<?php
    if( !isset($_REQUEST['id']) || !isset($_REQUEST['type']) ) {
        header('location: home.php');
        exit;
    } else {

        if( ($_REQUEST['type'] != 'top-category') && ($_REQUEST['type'] != 'mid-category') && ($_REQUEST['type'] != 'end-category') ) {
            header('location: home.php');
            exit;
        } else {

            $statement = $pdo->prepare("SELECT * FROM tbl_top_category");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
            foreach ($result as $row) {
                $top[] = $row['tcat_id'];
                $top1[] = $row['tcat_name'];
            }

            $statement = $pdo->prepare("SELECT * FROM tbl_mid_category");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
            foreach ($result as $row) {
                $mid[] = $row['mcat_id'];
                $mid1[] = $row['mcat_name'];
                $mid2[] = $row['tcat_id'];
            }

            $statement = $pdo->prepare("SELECT * FROM tbl_end_category");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
            foreach ($result as $row) {
                $end[] = $row['ecat_id'];
                $end1[] = $row['ecat_name'];
                $end2[] = $row['mcat_id'];
            }

            if($_REQUEST['type'] == 'top-category') {
                if(!in_array($_REQUEST['id'],$top)) {
                    header('location: home.php');
                    exit;
                } else {

                    // Getting Title
                    for ($i=0; $i < count($top); $i++) { 
                        if($top[$i] == $_REQUEST['id']) {
                            $title = $top1[$i];
                            break;
                        }
                    }
                    $arr1 = array();
                    $arr2 = array();
                    // Find out all ecat ids under this
                    for ($i=0; $i < count($mid); $i++) { 
                        if($mid2[$i] == $_REQUEST['id']) {
                            $arr1[] = $mid[$i];
                        }
                    }
                    for ($j=0; $j < count($arr1); $j++) {
                        for ($i=0; $i < count($end); $i++) { 
                            if($end2[$i] == $arr1[$j]) {
                                $arr2[] = $end[$i];
                            }
                        }   
                    }
                    $final_ecat_ids = $arr2;
                }   
            }

            if($_REQUEST['type'] == 'mid-category') {
                if(!in_array($_REQUEST['id'],$mid)) {
                    header('location: home.php');
                    exit;
                } else {
                    // Getting Title
                    for ($i=0; $i < count($mid); $i++) { 
                        if($mid[$i] == $_REQUEST['id']) {
                            $title = $mid1[$i];
                            break;
                        }
                    }
                    $arr2 = array();        
                    // Find out all ecat ids under this
                    for ($i=0; $i < count($end); $i++) { 
                        if($end2[$i] == $_REQUEST['id']) {
                            $arr2[] = $end[$i];
                        }
                    }
                    $final_ecat_ids = $arr2;
                }
            }

            if($_REQUEST['type'] == 'end-category') {
                if(!in_array($_REQUEST['id'],$end)) {
                    header('location: home.php');
                    exit;
                } else {
                    // Getting Title
                    for ($i=0; $i < count($end); $i++) { 
                        if($end[$i] == $_REQUEST['id']) {
                            $title = $end1[$i];
                            break;
                        }
                    }
                    $final_ecat_ids = array($_REQUEST['id']);
                }
            }
            
        }   
    }
?>