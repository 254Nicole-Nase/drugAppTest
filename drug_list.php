<?php
// Define the get_drug_html() function here
// Define the get_drug_html() function here
function get_drug_html($drug) {
    $output = "<li>";
    $output .= "<h2>" . $drug["drug_name"] . "</h2>";
        // Add the image tag to display the drug image
        $output .= "<img src='" . $drug["image_url"] . "' alt='" . $drug["drug_name"] . "' />";
    $output .= "<p>" . $drug["description"] . "</p>";
    // Add more HTML to display other drug details, if needed
    $output .= "</li>";

    return $output;
}


$pageTitle = "Drug List";
$section = null;

include("data.php"); // Include your data source file

include 'header.php';

// Include the database connection script
require_once("db_connection.php"); // Replace with the actual filename
?>

<div class="wrapper">
    <h1>Drug List</h1>

    <?php
    // Retrieve drug data from the database, categorize by category name
    $categoryData = array(); // Initialize an array to store drugs by category

    // Query to retrieve drug data, including category name
    $query = "SELECT drug_id, drug_name, description, image_url, category_name
              FROM drug_details
              JOIN drug_categories ON drug_details.category_id = drug_categories.category_id
              ORDER BY drug_categories.category_name, drug_details.drug_name";

    // Execute the query and fetch the results
    $result = $conn->query($query);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $categoryName = $row["category_name"];
            if (!isset($categoryData[$categoryName])) {
                // Initialize an array for the category if it doesn't exist
                $categoryData[$categoryName] = array();
            }

            // Add drug data to the category array
            $categoryData[$categoryName][] = $row;
        }

        // Close the result set
        $result->close();
    }

    // Display drugs by category
    foreach ($categoryData as $categoryName => $categoryDrugs) {
        echo "<h2>$categoryName</h2>";

        echo "<ul class='items'>";
        foreach ($categoryDrugs as $drug) {
            echo get_drug_html($drug);
        }
        echo "</ul>";
    }
    ?>

</div>
</div>

<?php include 'footer.php'; ?>
