<?php
    $dir_locationK = $dir_location;
    if($dir_locationK == "."){
        $dir_location_link = ".";
    }
    elseif($dir_locationK == ".."){
        $dir_location_link = ".";
    }
    elseif($dir_locationK == "../.."){
        $dir_location_link = "..";
    }
    else{
        $dir_location_link == "../..";
    }
?>
<nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="<?php echo $dir_location_link ?>/" class="flex items-center">
        <img src="<?php echo $dir_location ?>/src/assets/images/logo-banner.png" class="w-36 mr-3" alt="logo">
        </a>
    </div>
    <div class=" bg-primary flex flex-wrap items-center justify-between w-full px-3 lg:px-8 py-2">
        <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden focus:outline-none dark:text-gray-400" aria-controls="navbar-multi-level" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden bg-primary w-full md:block md:w-full " id="navbar-multi-level">
            <ul class="nav flex justify-center flex-col bg-primary font-medium p-4 md:p-0 mt-4 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 dark:bg-gray-800">
                <li class="w-full">
                <a href="<?php echo $dir_location_link ?>/" class="<?php if($type_page == 'dashboard'){echo "active";} ?> block py-4 pl-3 pr-4 text-white rounded md:bg-transparent md:p-0 md:dark:text-white font-bold dark:bg-blue-600 md:dark:bg-transparent">
                    Dashboard</a>
                </li>
                <li class="w-full">
                <a href="<?php echo $dir_location_link ?>/buku" class="<?php if($type_page == 'buku'){echo "active";} ?> block py-4 pl-3 pr-4 text-white rounded md:border-0 md:hover:text-white font-bold md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700">
                    Buku</a>
                </li>
                <li class="w-full">
                <a href="<?php echo $dir_location_link ?>/pengguna" class="<?php if($type_page == 'pengguna'){echo "active";} ?> block py-4 pl-3 pr-4 text-white rounded md:border-0 md:hover:text-white font-bold md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700">
                    Pengguna</a>
                </li>
                <li class="w-full">
                <a href="<?php echo $dir_location_link ?>/permohonan" class="<?php if($type_page == 'permohonan'){echo "active";} ?> block py-4 pl-3 pr-4 text-white rounded md:border-0 md:hover:text-white font-bold md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700">
                    Permohonan</a>
                </li>
                <a href="<?php echo $dir_location_link ?>/achivements.php" class="<?php if($type_page == 'achivements'){echo "active";} ?> block py-4 pl-3 pr-4 text-white rounded md:border-0 md:hover:text-white font-bold md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700">
                    Achivements</a>
                </li>
                <li class="w-full">
                    <a href="<?php echo $dir_location_link?>/system/log-out.php" class="logout w-full">
                        <center>
                            <img src="<?php echo $dir_location ?>/src/assets/images/icons/logout.png" style="height: 25px;" alt="icon">
                        </center>
                    </a>
                </li>
                <!-- <li class="w-full text-center">
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex text-center items-center justify-between w-full py-2 pl-3 pr-4 text-transparent rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-transparent md:p-0 md:w-auto dark:text-transparent md:dark:hover:text-transparent dark:focus:text-transparent dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                        <img class="setting-icon h-7 hidden md:block" src="<?php echo $dir_location ?>/src/assets/images/icons/setting.png" alt="">
                    </button>
                    <div id="dropdownNavbar" class="bg-primary z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-white font-bold dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                        <li>
                            <a href="#" class="block px-4 py-2">User info</a>
                        </li>
                        </ul>
                        <div class="py-1">
                        <a href="<?php echo $dir_location_link ?>/system/log-out.php" class="block px-4 py-2 text-sm text-white">Sign out</a>
                        </div>
                    </div>
                </li> -->
            </ul>

        </div>

    </div>
</nav>

<br>

<?php
    session_start();
    //prompt function
    function alertMsg($alertMsg){
        if($alertMsg == ""){

        }
        else {
            echo("<script type='text/javascript'> var answer = alert('".$alertMsg."'); </script>");
        }
    }

    alertMsg($_SESSION['prompt']);
    $_SESSION['prompt'] = "";
?>