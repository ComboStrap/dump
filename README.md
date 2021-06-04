# Dokuwiki Dump Plugin

## About
This [Dokuwiki Plugin](https://www.dokuwiki.org/plugin:dump) dumps the callstack (the array of instructions) in a json format.

This is to be able to debug a bad rendering when you don't have access to the server.

## How it works

### Menu

This plugin will add a button in the menu tool called `CallStack`.

![CallStack icon](./resources/image/stack.png)

If you click on it, you will see the callstack in `json` format.


