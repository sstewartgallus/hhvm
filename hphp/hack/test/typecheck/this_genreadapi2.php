<?hh // strict
/**
 * Copyright (c) 2014, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the BSD-style license found in the
 * LICENSE file in the "hack" directory of this source tree. An additional grant
 * of patent rights can be found in the PATENTS file in the same directory.
 *
 */
interface GenReadApi<Tk, Tv> {}

class GenReadApiClass<Tk, Tv> implements GenReadApi<Tk, Tv> {
  public function __construct(
    private Tv $v,
  ) {}
}

class Foo {
  public static function make<Tk>(): GenReadApi<Tk, mixed> {
    return new GenReadApiClass(null);
  }
}

class Bar extends Foo {
  public static function make<Tk>(): GenReadApi<Tk, this> {
    return new GenReadApiClass(new static());
  }
}

interface GenReadIdxApi<Tk, Tv> {}

class GenReadIdxApiClass<Tk, Tv> implements GenReadIdxApi<Tk, Tv> {
  public function __construct(
    private Tv $v,
  ) {}
}

class FooIdx {
  public static function make<Tk>(): GenReadIdxApi<Tk, mixed> {
    return new GenReadIdxApiClass(null);
  }
}

class BarIdx extends FooIdx {
  public static function make<Tk>(): GenReadIdxApi<Tk, this> {
    return new GenReadIdxApiClass(new static());
  }
}
