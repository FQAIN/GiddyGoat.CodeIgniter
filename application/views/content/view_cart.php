<?php
$this->load->helper('url');
$base_url = base_url();
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>
    </head>
    <body>
        <br>
        <br>
        <br>
        <h2>My Shopping Cart</h2>
        <h4>A shopping cart is a piece of software that keeps the record of the items a buyer has ‘picked up’ from the online store. Acting as an online store’s catalog, the eCommerce shopping cart enables consumers to select products, review what they selected, make modifications or add extra items if needed, and purchase the products.</h4>
  <br>
        <br>
        <br>
        <table>
            <tr>
                <td><strong>Product Name:</strong></td>
                <td><strong>Description:</strong></td>
                <td><strong>Quantity:</strong></td>
                <td><strong>Price:</strong></td>
                <td><strong>Image:</strong></td>
                <td><strong>Delete:</strong></td>
            </tr>
                            <tr>
                                  <?php foreach ($items->result_array() as $item): ?>
                                <td><?php echo $item['product_name']; ?></td>
                                <td><?php echo $item['product_desc']; ?></td>
                                <td><?php echo $item['quantity']; ?></td>
                                <td><?php echo $item['price']; ?></td>
                                <td>   <img src="<?php echo $base_url . $item['image_path']; ?>" width="100%"/></td>
                                <td>
           
                                        <form action="<?php echo site_url('ShoppingCartController/deleteItem'); ?>" method="POST">

    
                                                
                                        <?php if (!$item['class_id'] == NULL) : ?>
                                            <input type="hidden" name="class_id" value="<?php echo $item['class_id']; ?>">    
                                        <?php elseif (!$item['fabric_id'] == NULL) : ?>
                                            <input type="hidden" name="fabric_id" value="<?php echo $item['fabric_id']; ?>">
                                        <?php elseif (!$item['notion_id'] == NULL) : ?>
                                            <input type="hidden" name="notion_id" value="<?php echo $item['notion_id']; ?>">
                                        <?php endif; ?>
                                             <input type="hidden" name="id" value="<?php echo $item['id']  ?>">
                                            <input type="submit" class="btn btn-light" value="Delete">
                                        </form>
                                </td>
                            </tr>
                        
                              <?php endforeach; ?>
        </table>
    <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
    </body>
</html>
