// rollup config example for eleventy project

import { nodeResolve } from "@rollup/plugin-node-resolve";
import commonjs from "@rollup/plugin-commonjs";

export default {
  input: "./public/scripts/main.js",
  output: {
    file: "./public/scripts/main.bundle.js",
    format: "cjs",
  },
  plugins: [
    nodeResolve(), // Resolve npm modules
    commonjs(), // Convert CommonJS modules to ES modules
  ],
};
