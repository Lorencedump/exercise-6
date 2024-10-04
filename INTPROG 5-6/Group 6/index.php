<?php
$members = [
    ['name' => 'Marc Lorence Cabalida', 'role' => 'Leader', 'image' => 'lorence.jpg', 'age' => 20, 'birthday' => 'May 03, 2004', 'sex' => 'Male'],
    ['name' => 'Kingfranz Guevarra', 'role' => 'Member', 'image' => 'king.jpg', 'age' => 20, 'birthday' => 'September 05, 2004', 'sex' => 'Male'],
    ['name' => 'Chuckie Yonting', 'role' => 'Member', 'image' => 'chuckie.jpg', 'age' => 20, 'birthday' => 'November 22, 2003', 'sex' => 'Male'],
    ['name' => 'John Arly Murcia', 'role' => 'Member', 'image' => 'mirai.jpg', 'age' => 22, 'birthday' => 'September 03, 2002', 'sex' => 'Male'],
    ['name' => 'Rhea', 'role' => 'Member', 'image' => 'rhea.jpg', 'age' => 27, 'birthday' => 'June 30, 1997', 'sex' => 'Female']
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GROUP 6</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <div class="group6">
            <?php foreach ($members as $member): ?>
                <div class="member" onclick="showMemberInfo('<?php echo htmlspecialchars($member['name']); ?>', '<?php echo htmlspecialchars($member['role']); ?>', '<?php echo htmlspecialchars($member['image']); ?>', '<?php echo htmlspecialchars($member['age']); ?>', '<?php echo htmlspecialchars($member['birthday']); ?>', '<?php echo htmlspecialchars($member['sex']); ?>')">
                    <img src="<?php echo htmlspecialchars($member['image']); ?>" alt="<?php echo htmlspecialchars($member['name']); ?>">
                    <h2><?php echo htmlspecialchars($member['name']); ?></h2>
                    <p class="role"><?php echo htmlspecialchars($member['role']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="contact-button-container">
            <button id="contact-button">Contact Us</button>
        </div>

        <div id="contact-form-container" class="contact-form" style="display: none;">
            <h2>Contact Us</h2>
            <form id="contact-form" method="post">
                <input type="text" id="name" name="name" placeholder="Your Name" required>
                <input type="email" id="email" name="email" placeholder="Your Email" required>
                <input type="text" id="phone" name="phone" placeholder="Your Phone Number" required>
                <textarea id="message" name="message" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
            <div id="form-response"></div>
        </div>

    </div>
    <?php include 'footer.php'; ?>
    <script src="jscript.js"></script>

    <script>
        document.getElementById('contact-button').addEventListener('click', function() {
            const formContainer = document.getElementById('contact-form-container');
            formContainer.style.display = formContainer.style.display === 'none' ? 'block' : 'none';
        });

        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('contact.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('form-response').innerText = data.message;
                if (data.status === 'success') {
                    this.reset();
                }
            })
            .catch(error => {
                document.getElementById('form-response').innerText = 'An error occurred. Please try again.';
            });
        });
    </script>
</body>
</html>
