<?php

header('Content-Type: application/xml; charset=utf-8');

$conn = new mysqli("127.0.0.1", "saferasc_saferas", "saferasc_saferas", "saferasc_saferas");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0">
<channel>

<?php

$query = "SELECT p.id, p.ProductName, p.ProductSlug, p.ProductImage, s.RegularPrice, s.SalePrice 
FROM products p 
LEFT JOIN sizes s ON p.id = s.product_id 
WHERE p.status = 'Active'
GROUP BY p.id";

$result = $conn->query($query);

while($row = $result->fetch_assoc()) {

    $title = htmlspecialchars($row['ProductName']);
    $link = "https://saferas.com/view-product/" . trim($row['ProductSlug']);
    $image = "https://saferas.com/" . $row['ProductImage'];

    $price = $row['SalePrice'] > 0 ? $row['SalePrice'] : $row['RegularPrice'];

    echo "<item>";
    echo "<g:id>".$row['id']."</g:id>";
    echo "<g:title>".$title."</g:title>";
    echo "<g:description>".$title."</g:description>";
    echo "<g:link>".$link."</g:link>";
    echo "<g:image_link>".$image."</g:image_link>";
    echo "<g:availability>in stock</g:availability>";
    echo "<g:condition>new</g:condition>";
    echo "<g:price>".$price." BDT</g:price>";

    if($row['SalePrice'] > 0){
        echo "<g:sale_price>".$row['SalePrice']." BDT</g:sale_price>";
    }

    echo "</item>";
}

?>

</channel>
</rss>