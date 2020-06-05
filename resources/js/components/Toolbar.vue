<template>
    <div>
        <v-app-bar
            color="deep-purple accent-4"
            dense
            dark
        >
            <v-btn icon>
                <v-icon>mdi-menu</v-icon>
            </v-btn>

            <router-link to="/">
                <v-toolbar-title>MGHZ Site</v-toolbar-title>
            </router-link>

            <v-spacer></v-spacer>

            <div class="hidden-sm-and-down">
                <v-btn text>
                    Forum
                </v-btn>
                <v-btn text>
                    Ask Question
                </v-btn>
                <v-btn text>Category</v-btn>
                <router-link to="/login" >
                    <v-btn text>Login</v-btn>
                </router-link>

            </div>

            <v-menu
                left
                bottom
            >
                <template v-slot:activator="{ on }">
                    <v-btn icon v-on="on">
                        <v-icon>mdi-dots-vertical</v-icon>
                    </v-btn>
                </template>

                <v-list>
                    <v-list-item
                        v-for="n in 5"
                        :key="n"
                        @click="() => {}"
                    >
                        <v-list-item-title>Option {{ n }}</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>
        </v-app-bar>
    </div>
</template>
