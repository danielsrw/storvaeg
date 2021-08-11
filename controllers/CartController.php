<?php
    $error_message = '';
    if(isset($_POST['form1'])) {

        $i = 0;
        $statement = $pdo->prepare("SELECT * FROM tbl_product");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $i++;
            $table_product_id[$i] = $row['p_id'];
            $table_quantity[$i] = $row['p_qty'];
        }

        $i=0;
        foreach($_POST['product_id'] as $val) {
            $i++;
            $arr1[$i] = $val;
        }
        $i=0;
        foreach($_POST['quantity'] as $val) {
            $i++;
            $arr2[$i] = $val;
        }
        $i=0;
        foreach($_POST['product_name'] as $val) {
            $i++;
            $arr3[$i] = $val;
        }
        
        $allow_update = 1;
        for($i=1;$i<=count($arr1);$i++) {
            for($j=1;$j<=count($table_product_id);$j++) {
                if($arr1[$i] == $table_product_id[$j]) {
                    $temp_index = $j;
                    break;
                }
            }
            if($table_quantity[$temp_index] < $arr2[$i]) {
                $allow_update = 0;
                $error_message .= '"'.$arr2[$i].'" items are not available for "'.$arr3[$i].'"\n';
            } else {
                $_SESSION['cart_p_qty'][$i] = $arr2[$i];
            }
        }
        $error_message .= '\nOther items quantity are updated successfully!';
        ?>
        
        <?php if($allow_update == 0): ?>
            <script>alert('<?php echo $error_message; ?>');</script>
        <?php else: ?>
            <script>alert('All Items Quantity Update is Successful!');</script>
        <?php endif; ?>
        <?php

    }
?>