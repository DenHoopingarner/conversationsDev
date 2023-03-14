<?php
function guidv4()
{
    // Generate 16 bytes (128 bits) of random data or use your own implementation here
    $data = random_bytes(16);

    // Set the version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);

    // Set the variant to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the GUID in the format {XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX}
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
