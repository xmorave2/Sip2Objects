<?php

namespace SIP2;

class MessageTypes
{
    const PATRON_STATUS =
        ["msg" => "PatronStatus", "parse" => "PatronStatus"];
    const CHECKOUT =
        ["msg" => "Checkout", "parse" => "Checkout"];
    const CHECKIN =
        ["msg" => "Checkin", "parse" => "Checkin"];
    const BLOCK_PATRON =
        ]"msg" => "BlockPatron", "parse" => ""];
    const SC_STATUS =
        ["msg" => "SCStatus", "parse" => "ACSStatus"];
    const REQUEST_ACS_RESEND =
        ["msg" => "RequestACSResend", "parse" => "ACSStatus"];
    const LOGIN =
        ["msg" => "Login", "parse" => "Login"];
    const PATRON_INFORMATION =
        ["msg" => "PatronInformation", "parse" => "PatronInfo"]; 
    const END_PATRON_SESSION =
        ["msg" => "EndPatronSession", "parse" => "EndSession"];
    const FEE_PAID =
        ["msg" => "FeePaid", "parse" => "FeePaid"];
    const ITEM_INFORMATION =
        ["msg" => "ItemInformation", "parse" => "ItemInfo"];
    const ITEM_STATUS =
        ["msg" => "ItemStatus", "parse" => "ItemStatus"];
    const PATRON_ENABLE =
        ["msg" => "PatronEnable", "parse" => "PatronEnable"];
    const HOLD =
        ["msg" => "Hold", "parse" => "Hold"];
    const RENEW =
        ["msg" => "Renew", "parse" => "Renew"];
    const RENEW_ALL =
        ["msg" => "RenewAll", "parse" => "RenewAll"];
}
