<?php include '../components/header.php'; ?>

<table border='1'>
    <thead>
        <tr>
            <th>Course Name</th>        
            <th>Cost</th>        
        </tr> 
    </thead>
    <tbody>
       <?php include 'billing_process.php'; ?>
       <tr>
            <td>Total:</td>
            <td>$<?=$totalCost;?></td>
       </tr>
    </tbody>
</table>
<button>Make Payment</button>