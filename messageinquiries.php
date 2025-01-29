<!DOCTYPE html>
<html>
<head>
    <style>
        .chat-container {
            display: flex;
            height: 600px; /* Adjust height as needed */
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
        }
        .user-list {
            width: 25%;
            overflow-y: auto;
            border-right: 1px solid #ccc;
            background-color: #f8f9fc;
        }
        .conversation {
            width: 75%;
            display: flex;
            flex-direction: column;
        }
        #messageContainer {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            background-color: #f8f9fc;
        }
        #messageContainer .message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 10px;
            max-width: 70%;
        }
        #messageContainer .message.admin {
            margin-left: auto;
            background-color: #d1ecf1;
        }
        #messageContainer .message.user {
            margin-right: auto;
            background-color: #e2e3e5;
        }
        .message-input {
            display: flex;
            padding: 10px;
            background-color: #fff;
            border-top: 1px solid #dee2e6;
        }
        .message-input input {
            flex: 1;
            margin-right: 10px;
        }
    </style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">CalesTechSync</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="UserProfile.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>UserProfile</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ExerciseData.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>ExerciseRecords</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="messageinquiries.php">
                    <i class="fas fa-fw fa-envelope fa-fw"></i>
                    <span>MessageRequest</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Chat Interface -->
                    <div class="chat-container">
                        <!-- User List -->
                        <div class="user-list list-group" id="userList">
                            <!-- User items will be populated here -->
                        </div>
                        <!-- Conversation Area -->
                        <div class="conversation">
                            <div id="messageContainer">
                                <!-- Messages will be displayed here -->
                            </div>
                            <div class="message-input">
                                <input type="text" id="messageInput" placeholder="Type your message" class="form-control" />
                                <button id="sendButton" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- You can add your footer content here -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                    <a class="btn btn-primary" href="logoutFunc.php">Yes</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Section -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script>
        var adminUser = "Admin"; // Get admin username from session
        var selectedUser = null;

        // Fetch and display the list of users
        function fetchUsers() {
            fetch('getUsers.php')
                .then(response => response.json())
                .then(users => {
                    var userList = document.getElementById('userList');
                    userList.innerHTML = '';
                    users.forEach(user => {
                        var userItem = document.createElement('a');
                        userItem.href = '#';
                        userItem.classList.add('list-group-item', 'list-group-item-action');
                        userItem.textContent = user;
                        userItem.onclick = function(e) {
                            e.preventDefault();
                            selectUser(user);
                            // Highlight selected user
                            var items = document.querySelectorAll('.user-list .list-group-item');
                            items.forEach(i => i.classList.remove('active'));
                            userItem.classList.add('active');
                        };
                        userList.appendChild(userItem);
                    });
                })
                .catch(error => {
                    console.error('Error fetching users:', error);
                });
        }

        // Select a user and load the conversation
        function selectUser(user) {
            selectedUser = user;
            document.getElementById('messageContainer').innerHTML = '';
            fetchMessages();
        }

        // Fetch and display messages with the selected user
        function fetchMessages() {
            if (!selectedUser) return;

            fetch(`getMessagesBetweenUsers.php?contact=${encodeURIComponent(selectedUser)}`)
                .then(response => response.json())
                .then(messages => {
                    var messageContainer = document.getElementById('messageContainer');
                    messageContainer.innerHTML = '';
                    messages.forEach(message => {
                        var messageDiv = document.createElement('div');
                        messageDiv.classList.add('message');
                        if (message.sender === adminUser) {
                            messageDiv.classList.add('admin');
                        } else {
                            messageDiv.classList.add('user');
                        }
                        messageDiv.innerHTML = `<strong>${message.sender}:</strong> ${message.message}`;
                        messageContainer.appendChild(messageDiv);
                    });
                    // Scroll to the bottom
                    messageContainer.scrollTop = messageContainer.scrollHeight;
                })
                .catch(error => {
                    console.error('Error fetching messages:', error);
                });
        }

        // Send a message to the selected user
        document.getElementById('sendButton').addEventListener('click', function() {
            var messageInput = document.getElementById('messageInput');
            var message = messageInput.value.trim();
            if (message && selectedUser) {
                var formData = new URLSearchParams();
                formData.append('sender', adminUser);
                formData.append('receiver', selectedUser);
                formData.append('message', message);

                fetch('sendMessage.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: formData.toString()
                })
                .then(response => response.text())
                .then(result => {
                    if (result.trim() === "Message sent successfully") {
                        messageInput.value = '';
                        fetchMessages();
                    } else {
                        alert(result); // Display error message
                    }
                })
                .catch(error => {
                    console.error('Error sending message:', error);
                });
            } else if (!selectedUser) {
                alert("Please select a user to send a message.");
            }
        });

        // Send message on Enter key press
        document.getElementById('messageInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                document.getElementById('sendButton').click();
            }
        });

        // Periodically refresh messages every 3 seconds
        setInterval(fetchMessages, 3000);

        // Load users when the page loads
        document.addEventListener('DOMContentLoaded', fetchUsers);
    </script>

</body>
</html>
