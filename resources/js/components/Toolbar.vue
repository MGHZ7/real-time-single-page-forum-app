<template>
    <v-card class="overflow-hidden">
        <v-app-bar
            absolute
            color="indigo darken-2"
            dark
            shrink-on-scroll
            prominent
            scroll-target="#scrolling-techniques"
        >
            <v-btn icon>
                <v-icon>mdi-menu</v-icon>
            </v-btn>

            <v-toolbar-title>MGHZ</v-toolbar-title>

            <v-spacer></v-spacer>

            <v-toolbar-items class="hidden-sm-and-down">
                <v-btn text>
                    Forum
                </v-btn>
                <v-btn text>
                    Ask Question
                </v-btn>
                <v-btn text>Category</v-btn>
                <v-btn text>Login</v-btn>
            </v-toolbar-items>

        </v-app-bar>
        <v-sheet
            id="scrolling-techniques"
            class="overflow-y-auto"
            max-height="600"
        >
            <v-container style="height: 1000px;"></v-container>
        </v-sheet>
    </v-card>
</template>


<script>
    export default {
        name: "Toolbar"
    }
</script>

<style scoped>

</style>
