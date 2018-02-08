<?php

namespace SIP2;

class MessageTypes
{
    public static PATRON_STATUS =
        ["msg" => "PatronStatus", "parse" => "PatronStatus"];
    public static CHECKOUT =
        ["msg" => "Checkout", "parse" => "Checkout"];
    public static CHECKIN =
        ["msg" => "Checkin", "parse" => "Checkin"];
    public static BLOCK_PATRON =
        ]"msg" => "BlockPatron", "parse" => ""];
    public static SC_STATUS =
        ["msg" => "SCStatus", "parse" => "ACSStatus"];
    public static REQUEST_ACS_RESEND =
        ["msg" => "RequestACSResend", "parse" => "ACSStatus"];
    public static LOGIN =
        ["msg" => "Login", "parse" => "Login"];
    public static PATRON_INFORMATION =
        ["msg" => "PatronInformation", "parse" => "PatronInfo"]; 
    public static END_PATRON_SESSION =
        ["msg" => "EndPatronSession", "parse" => "EndSession"];
    public static FEE_PAID =
        ["msg" => "FeePaid", "parse" => "FeePaid"];
    public static ITEM_INFORMATION =
        ["msg" => "ItemInformation", "parse" => "ItemInfo"];
    public static ITEM_STATUS =
        ["msg" => "ItemStatus", "parse" => "ItemStatus"];
    public static PATRON_ENABLE =
        ["msg" => "PatronEnable", "parse" => "PatronEnable"];
    public static HOLD =
        ["msg" => "Hold", "parse" => "Hold"];
    public static RENEW =
        ["msg" => "Renew", "parse" => "Renew"];
    public static RENEW_ALL =
        ["msg" => "RenewAll", "parse" => "RenewAll"];
}
