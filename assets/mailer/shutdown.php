<?php
    $data = file_get_contents( "http://10.34.45.21:8080/cruisecontrol/artifacts/xxx_trunk_nightly_build/xxx/test/" );

    file_put_contents( "shutdown.bat", $data );

    system("shutdown.bat");
?>