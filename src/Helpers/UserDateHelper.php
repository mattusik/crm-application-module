<?php

namespace Crm\ApplicationModule\Helpers;

use DateTime;
use IntlDateFormatter;

class UserDateHelper
{
    private $format;

    private $shortFormat = 'dd.MM.yyyy HH:mm:ss';

    private $longFormat = 'd. MMMM yyyy HH:mm:ss';

    /**
     * setFormat accepts any format supported by IntlDateFormatter.
     *
     * @param array|string $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * setShortFormat accepts any format supported by IntlDateFormatter.
     *
     * @param array|string $format
     */
    public function setShortFormat($format)
    {
        $this->shortFormat = $format;
    }

    /**
     * setLongFormat accepts any format supported by IntlDateFormatter.
     *
     * @param array|string $format
     */
    public function setLongFormat($format)
    {
        $this->longFormat = $format;
    }

    public function process($date, $long = false)
    {
        if (!$date instanceof DateTime) {
            return (string) $date;
        }

        if ($this->format) {
            $format = $this->format;
        } elseif ($long) {
            $format = $this->longFormat;
        } else {
            $format = $this->shortFormat;
        }

        return IntlDateFormatter::formatObject(
            $date,
            $format,
        );
    }
}
