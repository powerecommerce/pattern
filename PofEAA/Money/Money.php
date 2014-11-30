<?php

/**
 * Copyright (c) 2015 DD Art Tomasz Duda
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace PowerEcommerce\Pattern\PofEAA\Money {

    /**
     * Class Money
     * @package PowerEcommerce\Pattern\PofEAA\Money
     */
    class Money
    {
        /**
         * @var string
         */
        private $_amount;

        /**
         * @var \PowerEcommerce\Pattern\PofEAA\Money\Currency
         */
        private $_currency;

        /**
         * @var int
         */
        private $_precision;

        /**
         * @var int
         */
        private $_round;

        /**
         * @param string $amount
         * @param \PowerEcommerce\Pattern\PofEAA\Money\Currency $currency
         * @param int $precision
         * @param int $round
         */
        function __construct($amount, Currency $currency, $precision = 4, $round = PHP_ROUND_HALF_UP)
        {
            $this->setAmount($amount);
            $this->setCurrency($currency);
            $this->setPrecision($precision);
            $this->setRound($round);
        }

        /**
         * @return string
         */
        function getAmount()
        {
            return $this->_amount;
        }

        /**
         * @return \PowerEcommerce\Pattern\PofEAA\Money\Currency
         */
        function getCurrency()
        {
            return $this->_currency;
        }

        /**
         * @return int
         */
        public function getPrecision()
        {
            return $this->_precision;
        }

        /**
         * @return int
         */
        public function getRound()
        {
            return $this->_round;
        }

        /**
         * @param string $amount
         */
        public function setAmount($amount)
        {
            $this->_amount = $amount;
        }

        /**
         * @param \PowerEcommerce\Pattern\PofEAA\Money\Currency $currency
         */
        public function setCurrency(Currency $currency)
        {
            $this->_currency = $currency;
        }

        /**
         * @param int $precision
         */
        public function setPrecision($precision)
        {
            $this->_precision = $precision;
        }

        /**
         * @param int $round PHP_ROUND_HALF_UP|PHP_ROUND_HALF_DOWN
         */
        public function setRound($round)
        {
            $this->_round = $round;
        }

        /**
         * @param string $amount
         * @return string
         */
        private function _round($amount)
        {
            $shift = 0;
            $this->getPrecision() == 0 && $shift -= 1;

            return (substr($amount, -1) < 5)
                ? substr($amount, 0, -1 + $shift)
                : substr($amount, 0, -2 + $shift) . ((int)substr($amount, -2 + $shift, -1 + $shift) + 1);
        }

        /**
         * @param string $func
         * @param \PowerEcommerce\Pattern\PofEAA\Money\Money $value
         */
        private function _operation($func, Money $value)
        {
            $this->_assertSameCurrencyAs($value);

            switch ($this->getRound()) {
                case PHP_ROUND_HALF_UP:
                    $this->_amount = $this->_round($func($this->getAmount(), $value->getAmount(), $this->getPrecision() + 1));
                    break;

                default:
                    $this->_amount = $func($this->getAmount(), $value->getAmount(), $this->getPrecision());
                    break;
            }
        }

        /**
         * @param \PowerEcommerce\Pattern\PofEAA\Money\Money $value
         */
        function add(Money $value)
        {
            $this->_operation('bcadd', $value);
        }

        /**
         * @param \PowerEcommerce\Pattern\PofEAA\Money\Money $value
         */
        function subtract(Money $value)
        {
            $this->_operation('bcsub', $value);
        }

        /**
         * @param \PowerEcommerce\Pattern\PofEAA\Money\Money $value
         */
        function multiply(Money $value)
        {
            $this->_operation('bcmul', $value);
        }

        /**
         * @param \PowerEcommerce\Pattern\PofEAA\Money\Money $value
         */
        function divide(Money $value)
        {
            $this->_operation('bcdiv', $value);
        }

        /**
         * @param \PowerEcommerce\Pattern\PofEAA\Money\Money $value
         */
        function modulo(Money $value)
        {
            $this->_operation('bcmod', $value);
        }

        /**
         * @param \PowerEcommerce\Pattern\PofEAA\Money\Money $value $value
         */
        private function _assertSameCurrencyAs(Money $value)
        {
            if (get_class($this->getCurrency()) != get_class($value->getCurrency())) {
                throw new \InvalidArgumentException('Currency');
            }
        }

        function __clone()
        {
            if (is_object($this->_currency)) {
                $this->_currency = clone $this->_currency;
            }
        }

        /**
         * @param int $targets
         * @return \PowerEcommerce\Pattern\PofEAA\Money\Money[]
         */
        function allocate($targets)
        {
            $_targets = clone $this;
            $_targets->setAmount($targets);

            $one = clone $this;
            $one->setAmount('1');

            $part = clone $this;
            $part->divide($_targets);

            $end = clone $this;
            $results = [];

            for ($i = 1; $i < $targets; $i++) {
                $results[] = $part;
                $end->subtract($part);
            }

            $results[] = $end;
            return $results;
        }
    }
}
