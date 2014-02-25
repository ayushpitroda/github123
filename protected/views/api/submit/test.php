<style type="text/css">
    fieldset {
        border: 1px #ccc solid;
        margin: 10px 0;
        padding: 0 10px;
    }
</style>

<form method="post" enctype="multipart/form-data" action="<?php echo $this->createUrl('api/submit')?>">
    <fieldset>
        <h3>ETS_PROPERTY</h3>
        PROPERTY_ID: <input type="text" name="ETS_PROPERTY[PROPERTY_ID]" value="1"> <br />
        BUSINESS_UNIT: <input type="text" name="ETS_PROPERTY[BUSINESS_UNIT]" value="CA001"> <br />
        FIRST_NAME: <input type="text" name="ETS_PROPERTY[FIRST_NAME]" value="John"> <br />
        LAST_NAME: <input type="text" name="ETS_PROPERTY[LAST_NAME]" value="SMITH"> <br />
        CUST_ADDRESS1: <input type="text" name="ETS_PROPERTY[CUST_ADDRESS1]" value="SMALLSYS INC"> <br />
        CUST_ADDRESS2: <input type="text" name="ETS_PROPERTY[CUST_ADDRESS2]" value="300 BOYLSTON AVE E"> <br />
        CUST_CITY: <input type="text" name="ETS_PROPERTY[CUST_CITY]" value="SEATTLE"> <br />
        CUST_STATE: <input type="text" name="ETS_PROPERTY[CUST_STATE]" value="WA"> <br />
        CUST_ZIP: <input type="text" name="ETS_PROPERTY[CUST_ZIP]" value="85728"> <br />
        CUST_EMAIL: <input type="text" name="ETS_PROPERTY[CUST_EMAIL]" value="cust7@gmail.com"> <br />
        CUST_HOME_PHONE: <input type="text" name="ETS_PROPERTY[CUST_HOME_PHONE]" value="5555555555"> <br />
        CUST_MOBILE: <input type="text" name="ETS_PROPERTY[CUST_MOBILE]" value="8248458889"> <br />
        SAME_ADDR_AS_CUST: <input type="text" name="ETS_PROPERTY[SAME_ADDR_AS_CUST]" value="1"> <br />
        ADDRESS1: <input type="text" name="ETS_PROPERTY[ADDRESS1]" value="SMALLSYS INC"> <br />
        ADDRESS2: <input type="text" name="ETS_PROPERTY[ADDRESS2]" value="300 BOYLSTON AVE E"> <br />
        CITY: <input type="text" name="ETS_PROPERTY[CITY]" value="SEATTLE"> <br />
        STATE: <input type="text" name="ETS_PROPERTY[STATE]" value="WA"> <br />
        ZIP: <input type="text" name="ETS_PROPERTY[ZIP]" value="85728"> <br />
        PHOTO: <input type="file" name="ETS_PROPERTY[PHOTO]"> <br />
        LASTMDDATT: <input type="text" name="ETS_PROPERTY[LASTMDDATT]" value=2000-12-04> <br />
    </fieldset>
    <fieldset>
        <h3>ETS_OBSERVATIONS</h3>
        <fieldset>
            <h4>Observation 1</h4>
            PROPERTY_ID: <input type="text" name="ETS_OBSERVATIONS[1][PROPERTY_ID]" value="1" /><br />
            ROOM_ID: <input type="text" name="ETS_OBSERVATIONS[1][ROOM_ID]" value="1" /><br />
            OBSERV_ID: <input type="text" name="ETS_OBSERVATIONS[1][OBSERV_ID]" value="a1" /><br />
            LASTUPDDTTM: <input type="text" name="ETS_OBSERVATIONS[1][LASTUPDDTTM]" value="2012-12-09" /><br />
            LASTUPDUSER: <input type="text" name="ETS_OBSERVATIONS[1][LASTUPDUSER]" value="1" /><br />
        </fieldset>
    </fieldset>
    <fieldset>
        <h3>ETS_OBSERV_PHOTOS</h3>
        <fieldset>
            <h4>Photo 1</h4>
            PROPERTY_ID: <input type="text" name="ETS_OBSERV_PHOTOS[1][PROPERTY_ID]" value="1" /> <br />
            ROOM_ID: <input type="text" name="ETS_OBSERV_PHOTOS[1][ROOM_ID]" value="1" /> <br />
            OBSERV_ID: <input type="text" name="ETS_OBSERV_PHOTOS[1][OBSERV_ID]" value="a1" /> <br />
            PHOTO_ID: <input type="text" name="ETS_OBSERV_PHOTOS[1][PHOTO_ID]" value="P01" /> <br />
            PHOTO: <input type="file" name="ETS_OBSERV_PHOTOS[1][PHOTO]" /> <br />
            LASTUPDDTTM: <input type="text" name="ETS_OBSERV_PHOTOS[1][LASTUPDDTTM]" value="2012-12-09" /> <br />
            LASTUPDUSER: <input type="text" name="ETS_OBSERV_PHOTOS[1][LASTUPDUSER]" value="1" /> <br />
        </fieldset>
    </fieldset>
    <fieldset>
        <h3>ETS_COMMENTS</h3>
        <fieldset>
            <h4>Comment 1</h4>
            PROPERTY_ID: <input type="text" name="ETS_COMMENTS[1][PROPERTY_ID]" value="1" /> <br />
            ROOM_ID: <input type="text" name="ETS_COMMENTS[1][ROOM_ID]" value="1" /> <br />
            OBSERV_ID: <input type="text" name="ETS_COMMENTS[1][OBSERV_ID]" value="a1" /> <br />
            COMMENT_ID: <input type="text" name="ETS_COMMENTS[1][COMMENT_ID]" value="P01" /> <br />
            LOCATION_ID: <input type="text" name="ETS_COMMENTS[1][LOCATION_ID]" value="1" /> <br />
            COMMENT_DESCR: <input type="text" name="ETS_COMMENTS[1][COMMENT_DESCR]" value="Description" /> <br />
            LASTUPDDTTM: <input type="text" name="ETS_COMMENTS[1][LASTUPDDTTM]" value="2012-12-09" /> <br />
            LASTUPDUSER: <input type="text" name="ETS_COMMENTS[1][LASTUPDUSER]" value="1"/> <br />
        </fieldset>
    </fieldset>
    <fieldset>
        <h3>ETS_ROOM_TESTS</h3>
        <fieldset>
            <h4>Room test 1</h4>
            PROPERTY_ID: <input type="text" name="ETS_ROOM_TESTS[1][PROPERTY_ID]" value="1" /><br />
            ROOM_ID: <input type="text" name="ETS_ROOM_TESTS[1][ROOM_ID]" value="2" /><br />
            OBSERV_ID: <input type="text" name="ETS_ROOM_TESTS[1][OBSERV_ID]" value="a1" /><br />
            TEST_ID: <input type="text" name="ETS_ROOM_TESTS[1][TEST_ID]" value="P01" /><br />
            TEST_COUNTER: <input type="text" name="ETS_ROOM_TESTS[1][TEST_COUNTER]" value="1" /><br />
            MOLD: <input type="text" name="ETS_ROOM_TESTS[1][MOLD]" value="1" /><br />
            BACTERIA: <input type="text" name="ETS_ROOM_TESTS[1][BACTERIA]" value="1" /><br />
            LASTUPDDTTM: <input type="text" name="ETS_ROOM_TESTS[1][LASTUPDDTTM]" value="2012-12-09" /><br />
            LASTUPDUSER: <input type="text" name="ETS_ROOM_TESTS[1][LASTUPDUSER]" value="1" /><br />
        </fieldset>
    </fieldset>
    <input type="submit" value="Submit" />
</form>