<?php include '../components/header.php'; ?>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Course Name</th>        
            <th>Cost</th>        
        </tr> 
    </thead>
    <tbody>
       <?php include 'billing_process.php'; ?>
       <tr>
            <td class="text-right">Total:</td>
            <td>$<?=$totalCost;?></td>
       </tr>
    </tbody>
</table>
<button class="btn btn-primary">Make Payment</button>