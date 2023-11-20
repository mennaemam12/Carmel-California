<div class="main-panel">
    <div class="content-wrapper" style="background-color: #DFE0DA;">
        <div class="row">

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="viewItemsContainer">
                        <div class="filterEntries">
                            <div class="entries">
                                Show <select name="" id="table_size" style="color: rgb(113, 113, 113);">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries
                            </div>

                            <div class="filter" style="color: black;">
                                <label for="search">Search:</label>
                                <input type="search" name="" id="search" placeholder="Enter product name">
                            </div>
                        </div>

                        <table>
                            <thead>
                                <tr class="heading">
                                    <th></th>
                                    <th>ID</th>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                </tr>
                            </thead>

                            <tbody class="menuInfo">
                                <tr>
                                    <td><img src="template/images/faces/face1.jpg" alt="" width="40" height="40"></td>
                                    <td>1</td>
                                    <td>Pasta</td>
                                    <td>30</td>
                                    <td>Breakfast</td>
                                    <td>
                                        <a class="itemOptions" href="product"><i class="fa-regular fa-eye"></i></a>
                                        <a class="itemOptions" href="dashboard/edititem"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a class="itemOptions"><i class="fa-regular fa-trash-can"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="template/images/faces/face1.jpg" alt="" width="40" height="40"></td>
                                    <td>1</td>
                                    <td>Pasta</td>
                                    <td>30</td>
                                    <td>Breakfast</td>
                                    <td>
                                        <a class="itemOptions" href="product"><i class="fa-regular fa-eye"></i></a>
                                        <a class="itemOptions" href="dashboard/edititem"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a class="itemOptions"><i class="fa-regular fa-trash-can"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="template/images/faces/face1.jpg" alt="" width="40" height="40"></td>
                                    <td>1</td>
                                    <td>Pasta</td>
                                    <td>30</td>
                                    <td>Breakfast</td>
                                    <td>
                                        <a class="itemOptions" href="product"><i class="fa-regular fa-eye"></i></a>
                                        <a class="itemOptions" href="dashboard/edititem"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a class="itemOptions"><i class="fa-regular fa-trash-can"></i></a>
                                    </td>
                                </tr>


                            </tbody>
                        </table>

                        <div class="tableFooter">
                            <span class="showEntries">Showing 1 to 10 of 50 entries</span>
                            <div class="pagination">
                                <button>Prev</button>
                                <button class="active">1</button>
                                <button>2</button>
                                <button>3</button>
                                <button>4</button>
                                <button>5</button>
                                <button>Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            include 'views/partials/dashboard/_footer.php'
        ?>
    </div>
</div>