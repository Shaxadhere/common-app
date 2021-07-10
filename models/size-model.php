<?php

class Size
{
    function List()
    {
        return mysqli_query(
            connect(),
            "SELECT * FROM `tbl_size` where deleted = 0"
        );
    }

    function Add($SizeValue)
    {
        $SizeValue = mysqli_real_escape_string(connect(), $SizeValue);
        insertData(
            "tbl_size",
            array(
                "SizeValue"
            ),
            array(
                $SizeValue
            ),
            connect()
        );
    }
    
    function View($SizeID)
    {
        $SizeID = mysqli_real_escape_string(connect(), $SizeID);
        return mysqli_query(
            connect(),
            "SELECT * FROM `tbl_size` where `tbl_size`.`PK_ID` = $SizeID"
        );
    }

    function Edit($SizeID, $SizeValue)
    {
        $SizeID = mysqli_real_escape_string(connect(), $SizeID);
        editData(
            "tbl_size",
            array(
                "SizeValue",
                $SizeValue
            ),
            "PK_ID",
            $SizeID,
            connect()
        );
    }

    function Delete($SizeID)
    {
        $SizeID = mysqli_real_escape_string(connect(), $SizeID);
        return mysqli_query(
            connect(),
            "UPDATE `tbl_size` SET `Deleted` = b'1' WHERE `tbl_size`.`PK_ID` = $SizeID"
        );
    }
}
