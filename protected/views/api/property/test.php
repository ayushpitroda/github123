<style type="text/css">
    fieldset {
        border: 1px #ccc solid;
        margin: 10px 0;
        padding: 0 10px;
    }
</style>
<h1>TEST1</h1>
<form method="post" enctype="multipart/form-data" action="<?php echo $this->createUrl('api/property/create')?>">
    <fieldset>
        <h3>New PROPERTY</h3>
        BUSINESS_UNIT: <input type="text" name="ETS_PROPERTY[BUSINESS_UNIT]" value="NJ001" /> <br />
        FIRST_NAME: <input type="text" name="ETS_PROPERTY[FIRST_NAME]" value="Jack" /> <br />
        LAST_NAME: <input type="text" name="ETS_PROPERTY[LAST_NAME]" value="Brown" /> <br />
        CUST_ADDRESS1: <input type="text" name="ETS_PROPERTY[CUST_ADDRESS1]" value="CUST_ADDRESS1" /> <br />
        CUST_ADDRESS2: <input type="text" name="ETS_PROPERTY[CUST_ADDRESS2]" value="CUST_ADDRESS2" /> <br />
        CUST_CITY: <input type="text" name="ETS_PROPERTY[CUST_CITY]" value="NYC" /> <br />
        CUST_STATE: <input type="text" name="ETS_PROPERTY[CUST_STATE]" value="NY" /> <br />
        CUST_ZIP: <input type="text" name="ETS_PROPERTY[CUST_ZIP]" value="12345" /> <br />
        CUST_EMAIL: <input type="text" name="ETS_PROPERTY[CUST_EMAIL]" value="customer@example.com" /> <br />
        CUST_HOME_PHONE: <input type="text" name="ETS_PROPERTY[CUST_HOME_PHONE]" value="1234567890" /> <br />
        CUST_MOBILE: <input type="text" name="ETS_PROPERTY[CUST_MOBILE]" value="1234567899" /> <br />
        SAME_ADDR_AS_CUST: <input type="text" name="ETS_PROPERTY[SAME_ADDR_AS_CUST]" value="1" /> <br />
        ADDRESS1: <input type="text" name="ETS_PROPERTY[ADDRESS1]" value="test address" /> <br />
        ADDRESS2: <input type="text" name="ETS_PROPERTY[ADDRESS2]" value="address2" /> <br />
        CITY: <input type="text" name="ETS_PROPERTY[CITY]" value="NYC" /> <br />
        STATE: <input type="text" name="ETS_PROPERTY[STATE]" value="NY" /> <br />
        ZIP: <input type="text" name="ETS_PROPERTY[ZIP]" value="12345" /> <br />
        HOME_PHONE: <input type="text" name="ETS_PROPERTY[HOME_PHONE]" value="1234567890" /> <br />
        MOBILE: <input type="text" name="ETS_PROPERTY[MOBILE]" value="1234567890" /> <br />
        APPT_DT: <input type="text" name="ETS_PROPERTY[APPT_DT]" value="2013-01-15" /> <br />
        APPT_TM: <input type="text" name="ETS_PROPERTY[APPT_TM]" value="10:00:00" /> <br />
        USER_ID: <input type="text" name="ETS_PROPERTY[USER_ID]" value="1" /> <br />
        NOTES: <input type="text" name="ETS_PROPERTY[NOTES]" value="" /> <br />
        CREATE_DTTM: <input type="text" name="ETS_PROPERTY[CREATE_DTTM]" value="2013-01-01 11:01:10" /> <br />
        LASTUPDDTTM: <input type="text" name="ETS_PROPERTY[LASTUPDDTTM]" value="2013-01-01 11:01:10" /> <br />
        LASTUPDUSER: <input type="text" name="ETS_PROPERTY[LASTUPDUSER]" value="1" /> <br />
        PROP_STATUS: <input type="text" name="ETS_PROPERTY[PROP_STATUS]" value="L" /> <br />
        STATUS: <input type="text" name="ETS_PROPERTY[STATUS]" value="1" /> <br />
        <input type="submit" value="Submit" />
    </fieldset>
</form>
<h1>TEST 2</h1>
<form method="post" enctype="multipart/form-data" action="<?php echo $this->createUrl('api/property/create')?>">
    <fieldset>
        <h3>New PROPERTY</h3>
        FIRST_NAME: <input type="text" name="ETS_PROPERTY[FIRST_NAME]" value="Jack" /> <br />
        LAST_NAME: <input type="text" name="ETS_PROPERTY[LAST_NAME]" value="Brown" /> <br />
        CUST_ADDRESS1: <input type="text" name="ETS_PROPERTY[CUST_ADDRESS1]" value="CUST_ADDRESS1" /> <br />
        CUST_ADDRESS2: <input type="text" name="ETS_PROPERTY[CUST_ADDRESS2]" value="CUST_ADDRESS2" /> <br />
        CUST_CITY: <input type="text" name="ETS_PROPERTY[CUST_CITY]" value="NYC" /> <br />
        BUSINESS_UNIT: <input type="text" name="ETS_PROPERTY[BUSINESS_UNIT]" value="N009" /> <br />

        <input type="submit" value="Submit" />
    </fieldset>
</form>