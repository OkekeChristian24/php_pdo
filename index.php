<?php
// DB parameters
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'pdoposts';

//  Setup the DSN (Data Source Name)
$dsn = 'mysql:host='.$host.';dbname='.$dbname;

// Create PDO instance for the connection
//$conn = new PDO($dsn, $user, $password);
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // Set the default fetch style to object
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // Change the emulation for the limit var to work


// PDO QUERY
//$stmt = $conn->query('SELECT * FROM posts');
//$stmt = $pdo->query('SELECT * FROM posts'); 

//while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
//  echo $row['title'] . '<br>';
//}

//while($row = $stmt->fetch()){
//  echo $row->title . '<br>';
//}


// PREPARED STATEMENTS (prepare and execute)

// Unsafe query
//$sql = "SELECT * FROM posts WHERE author = '$author'";

// Fetch multiple posts

// User input
$author = 'Chris';
$is_published = true;
$id = 2;
$limit = 2;

// Positional parameter
$sql = 'SELECT * FROM posts WHERE author = ? && is_published = ? LIMIT ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$author, $is_published, $limit]);
$posts = $stmt->fetchAll();

// Named parameter
//$sql = 'SELECT * FROM posts WHERE author = :author && is_published = :is_published';
//$stmt = $pdo->prepare($sql);
//$stmt->execute([':author' => $author, ':is_published' => $is_published]);
//$posts = $stmt->fetchAll();
//
//
//// var_dump($posts);
foreach($posts as $post){
    echo $post->title . ': '. $post->body . '<br>';
}

// Fetch single post

//$sql = 'SELECT * FROM posts WHERE id = :id';
//$stmt = $pdo->prepare($sql);
//$stmt->execute([':id' => $id]);
//$post = $stmt->fetch();
//echo $post->title . ': ' . $post->body;


// Get row count
//$stmt = $pdo->prepare('SELECT * FROM posts WHERE author = ?');
//$stmt->execute([$author]);
//
//$rowCount = $stmt->rowCount();
//echo $rowCount;


// Inserting data
//$title = 'Post Six';
//$body = 'This is post six. It was inserted or added';
//$author = 'Esther';
//
//$sql = 'INSERT INTO posts(title, body, author) VALUES(:title, :body, :author)';
//$stmt = $pdo->prepare($sql);
//$result = $stmt->execute([':title' => $title, ':body' => $body, ':author' => $author]);
//
//
//if($result){
//    echo 'Post inserted';
//}else{
//    echo 'Error: ' . $stmt->error;
//}


// Update data
//$id = 2;
//$body = 'This is an updated post';
//
//$sql = 'UPDATE posts SET body = :body WHERE id = :id';
//$stmt = $pdo->prepare($sql);
//$stmt->execute(['body' => $body, 'id' => $id]);
//echo 'Post updated';


// Delete data
//$id = 2;
//
//$sql = 'DELETE FROM posts WHERE id = :id';
//$stmt = $pdo->prepare($sql);
//$stmt->execute(['id' => $id]);
//echo 'Post deleted';

// Search data
//$search = '%it%';
//$sql = 'SELECT * FROM posts WHERE body LIKE ?';
//$stmt = $pdo->prepare($sql);
//$stmt->execute([$search]);
//$posts = $stmt->fetchAll();
//
//foreach($posts as $post){
//    echo $post->body . '<br>';
//}

?>