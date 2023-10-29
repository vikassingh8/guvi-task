<?php

require 'vendor/autoload.php'; // Include the Composer autoloader

// Replace these with your MongoDB Atlas connection details
$mongoURI = "mongodb+srv://vikas:ZpOZzyAfBaophXEx@cluster0.gx4xuwg.mongodb.net/guvi?retryWrites=true&w=majority";

try {
    $client = new MongoDB\Client($mongoURI);
    $collection = $client->guvi->profile; // Replace with your database and collection name

    // Insert a document
    $document = [
        'name' => 'John Doe',
        'email' => 'johndoe@example.com',
    ];

    $collection->insertOne($document);
    
    echo "Document inserted successfully.";

    // Find documents
    $cursor = $collection->find([]);

    foreach ($cursor as $document) {
        echo '<pre>';
        var_dump($document);
        echo '</pre>';
    }

} catch (MongoDB\Driver\Exception\Exception $e) {
    echo "MongoDB Error: " . $e->getMessage();
}
?>