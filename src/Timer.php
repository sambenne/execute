<?php
    namespace SamBenne\Execute;

    /**
     * Class Timer
     * @package Execute
     */
    class Timer
    {
        /**
         * @var \SamBenne\Execute\Timer|null
         */
        protected static $instance = null;

        /**
         * @var array
         */
        private static $timers = [];

        /**
         * Get Instance
         *
         * @return \SamBenne\Execute\Timer
         */
        public static function getInstance()
        {
            if (!isset(static::$instance)) {
                static::$instance = new static();
            }

            return static::$instance;
        }

        /**
         * Start Timer
         *
         * @param string $id
         */
        public static function start( $id = 'default')
        {
            self::$timers[$id] = [ 'start' => microtime(TRUE) ];
        }

        /**
         * Stop Timer
         *
         * @param string $id
         */
        public static function stop( $id = 'default')
        {
            self::$timers[$id]['stop'] = microtime(TRUE);
        }

        /**
         * Output Time
         *
         * This will call self::stop
         *
         * @param string $id
         *
         * @return string
         */
        public static function output( $id = 'default')
        {
            self::stop($id);
            $timer = self::$timers[$id];

            $timestamp = self::calculate($timer);

            return 'Executed in: '.$timestamp;
        }

        /**
         * Calculates a human friendly time stamp.
         *
         * @param array $timer
         *
         * @return string
         */
        private static function calculate($timer)
        {
            $seconds = ($timer['stop'] - $timer['start']);

            // First we calculate milliseconds and seconds
            $milliseconds = str_replace("0.", '', $seconds - floor($seconds));
            $seconds = $seconds % 3600;

            // If seconds is more than a minute
            if ($seconds >= 60) {
                return gmdate('i:s', $seconds).' min';
            } elseif ($seconds < 60 && $seconds != 0) {
                $time = gmdate('s', $seconds);
                if ($milliseconds) {
                    $time .= '.'.$milliseconds;
                }
                return $time.' sec';
            } else {
                return '0.'.round($milliseconds, 2).' sec';
            }
        }

        /**
         * Output Time in Minutes
         *
         * This will call self::stop
         *
         * @param string $id
         *
         * @return string
         */
        public static function outputMinutes( $id = 'default')
        {
            self::stop($id);
            $timer = self::$timers[$id];

            $executionTime = ($timer['stop'] - $timer['start']) / 60;

            return '<b>Total Execution Time:</b> '.$executionTime.' mins';
        }
    }
