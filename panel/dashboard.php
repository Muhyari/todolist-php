<?php
include("../config/connection.php");
$query = mysqli_query($conn, "SELECT * FROM todolist LIMIT 10");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style/dashboard.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="container_wrap">
        <div class="sidebar">
            <div class="top-text">
                <h2>Sidebar menu</h2>
            </div>
            <div class="down-text">
                <a href="#">Edit</a>
                <a href="#">Tambah</a>
                <a href="#">history</a>
            </div>
        </div>
        <main>
            <div class="navbar">
                <button class="button-sidebar" onclick="buttonSidebar()">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <h1>Dashboard</h1>
                <a href="#">Keluar</a>
            </div>
            <div class="todolist-content">
                <div class="todolist-content-header">
                    <h2>what do you want to do today?</h2>
                </div>
                <div class="todolist-content-body">
                    <?php foreach ($result as $key => $r) : ?>
                        <form class="card">
                            <div class="card-head">
                                <p><?php echo $r["title"] ?></p>
                                <i class="fa fa-heart-o fa-2x " aria-hidden="true"></i>
                            </div>
                            <div class="card-body">
                                <p><?php echo $r["Todo"] ?></p>
                            </div>
                            <div class="card-footer">
                                <div>

                                    <a class="delete" href="../php/delete.php?id=<?php echo $r['id'] ?>">
                                        <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                                    </a>

                                </div>

                            </div>
                        </form>
                    <?php endforeach ?>
                </div>
            </div>
        </main>
    </div>

</body>
<script>
    const cards = document.querySelectorAll(".card")
    const deleteAnimation = document.querySelectorAll(".delete")

    document.addEventListener("DOMContentLoaded", () => {
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.classList.add("on-open-first")
            }, 200 * index + 100)
        })
    })


    deleteAnimation.forEach((but, index) => but.addEventListener('click', () => {
        cards[index].classList.add("delete-animation")
        cards[index].addEventListener('animationend', () => {
            cards[index].remove()
        })
    }))

    let count = 0

    function buttonSidebar() {
        count++
        const sidebar = document.querySelector(".sidebar")
        const main = document.querySelector("main")
        const buttonSidebar = document.querySelector(".button-sidebar")
        if (count % 2 === 1) {
            sidebar.style = "left: 0; position: relative;"
            main.classList.add("transisi")
            main.classList.remove("close")

        } else {
            sidebar.style = "position: absolute; left: -100%"
            main.classList.remove("transisi")
            main.classList.add("close")
        }

    }

    function isActive() {
        this.classList.remove("fa-heart-o")
        this.classList.add("fa-heart")
        this.removeEventListener('click', isActive)
        this.addEventListener('click', notActive)
    }

    function notActive() {
        this.classList.remove("fa-heart")
        this.classList.add("fa-heart-o")
        this.removeEventListener('click', notActive)
        this.addEventListener('click', isActive)
    }

    const icon = document.querySelectorAll(".fa-heart-o")
    icon.forEach(card => card.addEventListener('click', isActive))
    icon.forEach(card => card.addEventListener('mouse', notActive))

    const carousel = document.querySelector(".todolist-content-body")

    let isDragging = false,
        startScrollLeft, startX
    const dragging = (e) => {
        if (!isDragging) return;
        carousel.scrollLeft = startScrollLeft - (e.pageX - startX)

    }
    const dragStart = (e) => {
        isDragging = true
        carousel.classList.add("dragging")
        startScrollLeft = carousel.scrollLeft
        startX = e.pageX
    }

    const dragStop = () => {
        isDragging = false
        carousel.classList.remove("dragging")
    }

    carousel.addEventListener("mousemove", dragging)
    carousel.addEventListener("mousedown", dragStart)
    window.addEventListener("mouseup", dragStop)
</script>

</html>