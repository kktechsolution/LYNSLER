<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://www.zohoapis.in/crm/v3/Products?fields=Product_Category,Product_Code',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer 1000.995097c4ad9edc9588d1b5dd1ac3f67d.6792e9fc8c0cb2328dda670424837d28',
        'Cookie: 941ef25d4b=dbba8cf7e49b73419f0c773414f1a6df; JSESSIONID=41E678FFC551B2915150862FA9543B58; _zcsr_tmp=5c5f3fda-e523-41ce-a51a-030ea2e62703; crmcsr=5c5f3fda-e523-41ce-a51a-030ea2e62703'
    ),
));

$response = curl_exec($curl);

curl_close($curl);

$data = json_decode($response, true);

$categories = array();

foreach ($data['data'] as $product) {
    $categories[$product['Product_Category']] = true;
}

$unique_categories = array_keys($categories);

$productsByCategory = array();

foreach ($data['data'] as $product) {
    $category = $product['Product_Category'];
    $code = $product['id'];
    $label = str_replace('-', ' ', $product['Product_Code']); // Convert product code to title case
    $productsByCategory[$category][] = array('value' => $code, 'label' => $label);
}

$productsByCategoryJson = json_encode($productsByCategory);

// print_r($productsByCategoryJson);

// echo $response;
?>
<html>

<head>

</head>

<body style="align-items: center;">
    <label for="category">Select a category:</label>

    <select id="category" name="category" style="align-items:center;height:35px">
        <option value="">-----Select Category-----</option>
        <?php
        foreach ($unique_categories as $category) {
            echo "<option value=" . $category . ">" . $category . "</option>";
        }
        ?>
    </select>
    <label for="product">Select a product:</label>

    <select id="product" name="product" style="align-items:center;height:35px">
        <option value="">--Please choose a category first--</option>
    </select>

</body>
<script>
    // Get references to the select elements
    const categorySelect = document.getElementById('category');
    const productSelect = document.getElementById('product');

    // Define the products for each category
    const productsByCategory = <?php echo $productsByCategoryJson; ?>;

    // Define a function to populate the product select element
    function populateProductSelect(category) {
        // Clear any existing options
        productSelect.innerHTML = '';

        // Add a default option
        const defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.text = '--Please choose a category first--';
        productSelect.add(defaultOption);


        // Add the options for the selected category
        productsByCategory[category].forEach(product => {
            const option = document.createElement('option');
            option.value = product.value;
            option.text = product.label;
            productSelect.add(option);
        });
    }

    // Handle the change event of the category select element
    categorySelect.addEventListener('change', event => {
        const selectedCategory = event.target.value;
        populateProductSelect(selectedCategory);
    });
</script>

</html>