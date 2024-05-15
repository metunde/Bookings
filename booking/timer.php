
<div class="">
    
    <?php
      if (isset($_SESSION['auth']) && $_SESSION['expiration_time'] > time())  {
      ?>
        <?php include 'include/sidebar.php';
  
              include 'include/navbar.php';
        ?>
  
        <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
          <span class="sr-only">Open sidebar</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
          </svg>
        </button>
  
  
  
        <?php
        // Include any PHP processing or logic here
        echo $navbarContent;
        // Display the HTML content
        echo $SidebarContent;
  
       
        ?>
  
  
  
  
  
  
  
        <div class="p-4 sm:ml-64">
          <div class="p-4 border-2 border-gray-200 border-solid rounded-lg dark:border-gray-700">
  
            <h3>Appointemnt</h3>
            <hr>
  
  
            <form>
              <div class="mb-6">
                <label for="countries_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                <select multiple id="countries_multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option selected>Choose countries</option>
                  <option value="US">United States</option>
                  <option value="CA">Canada</option>
                  <option value="FR">France</option>
                  <option value="DE">Germany</option>
                </select>
              </div>
              <div class="mb-6">
                <label for="date" class="block mb-2 text-sm font-medium dark:text-cyan-950 ">Date</label>
                <input type="date" name="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " placeholder="Date" required />
              </div>
              <div class="mb-6">
                <label for="time" class="block mb-2 text-sm font-medium dark:text-cyan-950">Time</label>
                <input type="time" name="time" id="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Time" required />
              </div>
              <div class="mb-6">
                <label for="total-duration" class="block mb-2 text-sm font-medium dark:text-cyan-950">Total Duration</label>
                <input readonly name="duration" type="number" id="total-duration" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 font-bold" placeholder="Total Duration" required />
              </div>
              <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Time</label>
                <textarea placeholder="description" name="description" id="description" cols="33" rows="5"></textarea>
              </div>
              <div class="flex items-start mb-6">
                <div class="flex items-center h-5">
                  <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required />
                </div>
                <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a>.</label>
              </div>
              <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-80 sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
  
  
          </div>
        </div>
  
  
      <?php
        unset($_SESSION['auth']);
      }
      else
      ?>
    </div>


*****************************************************************************************************************************



    <?php
include 'connection.php';


$services = $_POST['services'];
$date = $_POST['date'];
$time = $_POST['time'];
$duration = $_POST['duration'];
$description = $_POST['description'];

$servicesString = implode(',', $services);

$store = $con->prepare('INSERT INTO appointments (services, date, time, duration, description) VALUES (?, ?, ?, ?, ?)');
$store->bind_param('sssis', $servicesString, $date, $time, $duration, $description);

$store->execute();
header('Location: appointment.php');
$store->close();
$con->close();

?>