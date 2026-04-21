import { ref, computed } from 'vue';

export const storeModuleFactory = (moduleName) => {
    const state = ref({});

    const getters = {
        all: computed(() => state.value)
    };

    const setters = {
        setAll: (items) => {
            for (const item of items) state.value[item.id] = Object.freeze(item);
        }
    };

    const actions = {
        getAll: async () => {
            const { data } = await getRequest(moduleName);
            if (!data) return;
            setters.setAll(data);
        }
    };

    return { getters, setters, actions };
};


