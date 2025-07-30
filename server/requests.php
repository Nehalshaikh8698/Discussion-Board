<?php
session_start();
include("../common/db.php");

// --- USER SIGNUP ---
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("INSERT INTO `users` (`username`, `email`, `password`, `address`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $address);
    $result = $stmt->execute();
    $user_id = $conn->insert_id;

    if ($result) {
        $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user_id];
        header("location: /php_project");
        exit();
    } else {
        echo "New user not registered.";
    }

// --- USER LOGIN ---
} elseif (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id, $username);
        $stmt->fetch();
        $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user_id];
        header("location: /php_project");
        exit();
    } else {
        echo "Invalid email or password.";
    }

// --- LOGOUT ---
} elseif (isset($_GET['logout'])) {
    session_unset();
    header("location: /php_project");
    exit();

// --- ASK QUESTION ---
} elseif (isset($_POST["ask"])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category'];
    $user_id = $_SESSION['user']['user_id'];

    $stmt = $conn->prepare("INSERT INTO `questions` (`title`, `description`, `category_id`, `user_id`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $title, $description, $category_id, $user_id);
    $result = $stmt->execute();

    if ($result) {
        header("location: /php_project");
        exit();
    } else {
        echo "Question was not added to the website.";
    }

// --- POST ANSWER ---
} elseif (isset($_POST["answer"])) {
    $answer = $_POST['answer'];
    $question_id = $_POST['question_id'];
    $user_id = $_SESSION['user']['user_id'];

    $stmt = $conn->prepare("INSERT INTO `answers` (`answer`, `question_id`, `user_id`) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $answer, $question_id, $user_id);
    $result = $stmt->execute();

    if ($result) {
        header("location: /php_project?q-id=$question_id");
        exit();
    } else {
        echo "Answer was not submitted.";
    }

// --- DELETE QUESTION ---
} elseif (isset($_GET["delete"])) {
    $qid = $_GET["delete"];
    $stmt = $conn->prepare("DELETE FROM questions WHERE id = ?");
    $stmt->bind_param("i", $qid);
    $result = $stmt->execute();

    if ($result) {
        header("location: /php_project");
        exit();
    } else {
        echo "Question not deleted.";
    }
}
?>
