<?php
      include 'include/navbar.php';
 

$date = $_GET['date'];
$time = $_GET['time'];
$description = $_GET['description'];
$services = $_GET['services'];
$totalPrice = $_GET['totalPrice'];
$totalDuration = $_GET['totalDuration'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <title>Booking</title>


</head>

<body>

    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <?php
    // Include any PHP processing or logic here
    echo $navbarContent;
   
    ?>







    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-solid rounded-lg dark:border-gray-700">

            <h3>Appointemnt</h3>
            <hr>


            <form method="post" action="retrieve.php">
            <div class="mb-6">
            <select name="services" id="services" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Services" required>
    <?php
    // Assuming $services is an array of service names
    echo '<option value="' . implode(',', $services) . '">' . implode(', ', $services) . '</option>';
    ?>
</select>
</div>
                <div class="mb-6">
                    <label for="date" class="block mb-2 text-sm font-medium dark:text-cyan-950 ">Date</label>
                    <input type="date" readonly value="<?= $date?>"  name="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " placeholder="Date" required />
                </div>
                <div class="mb-6">
                    <label for="time" class="block mb-2 text-sm font-medium dark:text-cyan-950">Time</label>
                    <input type="time" readonly value="<?= $time?>" name="time" id="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Time" required />
                </div>
                <div class="mb-6">
                    <label for="totalduration" class="block mb-2 text-sm font-medium dark:text-cyan-950 ">Estimated Service Duration</label>
                    <input type="number" readonly value="<?=$totalDuration ?>" name="totalduration" id="totalduration" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " placeholder="" required />
                </div>
                <div class="mb-6">
                    <label for="price" class="block mb-2 text-sm font-medium dark:text-cyan-950 ">Price</label>
                    <input type="price" readonly value="<?= $totalPrice?>" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " placeholder="" required />
                </div>
                <div class="mb-6">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Time</label>
                    <textarea placeholder="description" readonly value="description" name="description" id="description" cols="33" rows="5"><?= $description ?></textarea>
                </div>
    
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-80 sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>

        </div>
    </div>

</body>

</html>